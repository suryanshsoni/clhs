

<html>
    <head></head>
    <body>
        <?php
    if(isset($_POST['submitbtn'])){
        $selections=$_POST['myselections2'];
        foreach($selections as $option)
            echo $option." ";
    }
?>
        <form action="" method="post" id="myform">
            <select name="myselections[]" multiple id="myselectbox">
                <option value="1">Option 1</option>
                 <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                
            </select>
             <select name="myselections2[]" multiple id="myselectbox">
                <option value="1">Option 1</option>
                 <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                
            </select>
            
            <input type="submit" name="submitbtn" value="Click me">
        </form>
        
    </body>
</html>