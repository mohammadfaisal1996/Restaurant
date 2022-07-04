<?php


class addImage{


    public  $path="";
    public  $size="";
    public  $temp="";
    public  $name="";
    public  $baseUrl="";

    public function __construct($name,$path)
    {

        $extension = pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
        $Imagename=time().'t'."blueFig.".$extension;
        $tmp_name= $_FILES[$name]['tmp_name'];
        $size= $_FILES[$name]['size'];


        $this->name=$Imagename;
        $this->path=$path.$Imagename;
        $this->size=$size;
        $this->temp=$tmp_name;
        $this->baseUrl="https://".$_SERVER['SERVER_NAME'];
    }

    public function moveImage(){

        if(move_uploaded_file($this->temp,$this->path)){
            return 1;
        }else{
            return 0;
        }
    }

    public function getImageFullName(){
        return $this->baseUrl.'/'.$this->path;
    }

    public  function  getBaseUrl(){
        return $this->baseUrl."/uploads/images/imagesitems/";

    }


}


?>