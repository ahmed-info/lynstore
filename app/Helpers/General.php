<?php

function uploadImage($folderSroringPath, $image)
{
    $filename = time().'_'.$image->getClientOriginalName();
    $image->move("images/$folderSroringPath",$filename); //move to file
     return $folderSroringPath.'/'.$filename;
}
