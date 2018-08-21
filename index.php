<!doctype html>
<html>
 <head>
 <style>
 fieldset	{ display: flex; flex-direction: column; }
 fieldset > *	{ margin: 1em; }
 </style>
 </head>
 <body>
  <form method="get" action="run.php">
   <fieldset>
   <div>Username: <input type="text" name="user" value="ptable"></div>
   <div>Start year: <input type="number" name="yearstart" min=2006 max=2018></div>
   <div>End year: <input type="number" name="yearend" min=2006 max=2018></div>
   <div>Color: <select name="color">
    <option value="green">Green</option>
    <option value="red">Red</option>
    <option value="blue">Blue</option>
   </select></div>
   <div>Pages: <select name="pages">
    <option value="left">Left</option>
    <option value="right">Right</option>
   </select></div>
   <input type="submit">
   </fieldset>
  </form>
 </body>
</html>

