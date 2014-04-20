require 'pathname'
print Pathname.new(File.dirname(__FILE__)).realpath,"\n"
$:.unshift( Pathname.new(File.dirname(__FILE__)).realpath )

require 'webrick'
include WEBrick
#require 'json'
#require 'log'
#require 'com'

class GetEmail < HTTPServlet::AbstractServlet
  def do_GET(req,resp)
		query = HTTPUtils::parse_query(req.query_string)
	  csl = query["CSL"]
		resp.body = `/home/senya/LTE/PrachMtTool/queryCSLEmail.sh #{csl}`
		resp.status = 200
	end
end	

class UtWebServer

	def start
        config = {}

        config.update(:Port => 41475)
        config.update(:DocumentRoot => "/home/senya/LTE/PrachMtTool/")
        
        @server = HTTPServer.new(config)
        ['INT', 'TERM'].each {|signal|
          trap(signal) {
            @logger.error("Signal #{signal} received")
            @server.shutdown
          }
        }

        @server.mount('/getemail', GetEmail)

        @server.start
	end

	def cleanup
	  @server.shutdown
	end

end

if __FILE__ == $0
      begin
				#modified by bblu, enable reverse dns lookup
				#BasicSocket.do_not_reverse_lookup= true
        utWebRcv = UtWebServer.new
        utWebRcv.start

        rescue Exception => e
          bt = e.backtrace.join("\n")
          $stderr.puts("Exception in #{utWebRcv.getName}: #{e.message}\n#{bt}")
          exit 1
      end
      exit 0
end
