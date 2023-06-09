# COMPSCI 561 CTF!

## Find me!

A simple web interface written in PHP in which a user can upload any file. The trick here is that the website returns the path of the uploaded file on the server. So if a user uploaded a PHP script it can be executed by the uploaded url!
The flag is stored as a comment on the web page itself (i.e. php comment), since PHP files are parsed and executed on the server the flag never reaches the client, so students will be required to upload a php script and use it to look for the flag. I will include a hint here that the flag is stored somewhere on the page itself! 

### Possible Solution

1. Upload a file with a php content (`solution.php`)
```
<?php

echo "Hello World!";
```

2. Server will respond with:

```
{
  "path": "uploads/2023/04/01/d41d8cd98f00b204e9800998ecf8427e.php"
}
```

3. Open http://localhost:PORT/{path} in the browser:

Example:
http://localhost:3000/uploads/2023/04/01/d41d8cd98f00b204e9800998ecf8427e.php

4. Your code will be executed! So basically you need to execute code to browse files and view their content to find the flag!