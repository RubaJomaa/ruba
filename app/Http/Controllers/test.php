$mytime = Carbon::now();
        //Carbon is used for time matters, you can include it 'use Carbon\Carbon;',
        //i take the time to rename the image with respoect to the date/timestamp
        //the out put is sth like: 34783497239847239847

        $time = $mytime->toDateTimeString();
        //i convert the long number to human readable string

        $name = str_replace(':','-',$time);
        //this function replaced the char in the 1st parameter with the char in the 2nd param, in the string sepcified in the 3rd param
        //i use it, because the name of files cannot have ':' as part of the name.

        $image = $request->file('image');
        //i take the file, and i know it is an image. (in your case, you need to check if it is an image)

        $imagename = $image->getClientOriginalName();
        //I take the original name, i.e. the name that the user uploaded the name with.

        $temp = explode(".", $imagename);
        //explode is like split, it splits the the string on each delimiter, here the delimiter is '.'
        //why '.'? because the name of a file is sth like this 'filename.extension', so i take the extension
        //of course this is stupid, because we could take the extension with the php function getClientOriginalExtension();

        $name = $name.'.'.end($temp);
        //according to my solution, i take the last part of the exploded string (the extension) -- end($temp)
        //i form a name that is of two parts, the first part is the previous value of the $name, i.e. the date, and the 2nd part is the extension
        //you can form a name such that the 1st part is the usename, the 2nd part is the data, the 3rd part is the extension.

        $image->move('images/albums/'.$album_name, $name);
        //last but not at least, i move the file ($image) to the path specified ('images/albums/'.$album_name)
        //never be confused about $album_name, it's just my code, i have albums, and each ablum has pictures,
        //so i organized albums in folders and store pictures in them
        //BTW, what this line of code does is that it moves the $image to the path specified in the 1st param, with a name specified in param2
        //I want to point out that the path is of course within the public folder, notice that we don't need to say 'MyGraduationproject/public/images/....'

        Picture::insert([
          'album_id'=>$album->id,
          'name'=>$name,
          'created_at' => $time
          ]);
        //I then store the image in my pictures table, never mind about this
