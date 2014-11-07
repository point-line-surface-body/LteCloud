<?php
/**
 * Created by Yang Sen C.
 * User: Administrator
 * Date: 14-4-9
 * Time: 下午6:22
 */

//Uploading file Class
class upload{
    var $error = "";
    var $uploadFile = "";
    var $mimeType = "text/plain";
    var $filterType = "";
    var $fileSize = 4096;
    var $path = "files_uploaded";
    var $rename = true;
    var $file_ext = "";
    var $stat = false;

    //construct
    function __construct( $files, $path = "files_uploaded", $rename="true"){
        $this->path = $path;
        $this->filterType();
        $this->Filter();
        $this->file_readytouploaded = $files;
        $this->rename = $rename;
        $this->uploadFile();
    }
    //function uploadFile()
    function uploadFile(){
        $file = $this->file_readytouploaded;
        if( isset($file["tmp_name"]) and file_exists($file["tmp_name"]) ){
            //get the temp name of uploaded file
            $tmp_filename = $file["tmp_name"];
            //get tbe realname of uploadedfile
            $name = $file["name"];

            //define the directory which to save tmp file uploaded
            $dir = $this->path;



        }
    }
}

// Find the Email of the CSL, return "NONE" if not find
function getEmail($csl)
{
    //$curl = curl_init();
    //curl_setopt($curl, CURLOPT_URL, "http://135.251.224.225:41475/getemail?CSL=$csl");
    //curl_setopt($curl, CURLOPT_HEADER, 1);
    //curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //$data = curl_exec($curl);
    //curl_close($curl);
    //print_r($data);
    $data=`bash /local/LteCloud/getEmailbyCSL.sh $csl`;
    if ( preg_match ( '/([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/', $data, $matchstring) )
    {
        //print_r($matchstring[0]);
        return $matchstring[0];
    }
    else
    {
        return "NONE";
    }
}

// Find Emails of Several CSLs by Invoking function getEmail()
function findEmails($csl_string)
{
    $interval_flag="=";
    if($csl_string == "" )
    {
        return "NONE";
    }
    else
    {
        $emaillist = "";
        $csl_array= explode("-",$csl_string);
        foreach($csl_array as $csl)
        {
            $thisemail = getEmail($csl);
            if( $thisemail != "NONE" )
            {
                $emaillist = $emaillist.$thisemail.$interval_flag;
            }
        }
        if($emaillist == "")
        {
            return "NONE";
        }
        else
        {
            return rtrim( $emaillist, $interval_flag);
        }
    }
}

function randomKey($length)
{
    $pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
    $key='';
    for($i=0;$i<$length;$i++)
    {
        $key .= $pattern{mt_rand(0,35)};    
    }
    return $key;
}

//Send Email
require_once('./PHPMailer/PHPMailerAutoload.php');

function SendEmail($subject, $receivers, $mailbodytext)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "135.251.50.68";
    $mail->Port = 25;
    $mail->SMTPAuth = true;
    $mail->CharSet  = "UTF-8";
    $mail->Encoding = "base64";
    $mail->Username = "xxxxxx";
    $mail->Password = "xxxxxx";
    
    //Email Sender
    $mail->SetFrom(   "xxxxx","Yang Sen C");
    $mail->AddReplyTo("xxxxx","Yang Sen C");
    $mail->addCC("xxxxxx", "LteCloud");
    
    //Email Receviers
    $maillists=explode("=",$receivers);
    for($index=0;$index<count($maillists);$index++){
        #echo $maillists[$index];
        $mail->AddAddress($maillists[$index],'');
    }
    //Email Subject
    $mail->Subject  = $subject;
    
    //Body Format
    $mail->IsHTML(true); 
    
    //Email Logo Picture
    //$mail->AddEmbeddedImage("favicon.png", "ltecloud_logo", "favicon.png");
    if(mt_rand(0,9) > 4) {
        $picList=glob( '/local/LteCloud/dailypic/chinajoy2014/{*.jpg,*.gif,*png}', GLOB_BRACE);
    } else {
        $picList=glob( '/local/LteCloud/dailypic/naruto/{*.jpg,*.gif,*png}', GLOB_BRACE);
    }

    $picList=glob( '/local/LteCloud/dailypic/yunnan/{*.jpg,*.gif,*png}', GLOB_BRACE);
    shuffle($picList);
    $rndNum = rand(0,count($picList));
    #$rndNum = 0;
    
    $mail->AddEmbeddedImage( $picList[$rndNum], "dailypic", $picList[$rndNum]);
    
    //Email Body
    $mailbodytext =  $mailbodytext.'<img alt="http://172.24.186.185:8080" src="cid:dailypic">';
    $mail->Body   =  $mailbodytext;
    //$mail->AddAttachment("/local/LteCloud/dailypic/Apple/Apple20140909.jpg","Apple_2014_9_9.jpg");    

    //Send Email
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo; 
    } else {
        echo "Email Sent!"; 
    }
    
}

function getRealIpAddr()
{
   if (!empty($_SERVER['HTTP_CLIENT_IP']))
   {
      //check ip from share internet
      $ip=$_SERVER['HTTP_CLIENT_IP'];
   }
   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
   {
      //to check ip is pass from PRoxy
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else
   {
      $ip=$_SERVER['REMOTE_ADDR'];
   }
   $time_stamp=date("Y-m-d H:i:s");
   $str=$time_stamp." ".$ip."\n";
   $fh=fopen("/local/LteCloud/log.txt","a+");
   fwrite($fh, $str);
   fclose($fh);
}



getRealIpAddr();
?>
