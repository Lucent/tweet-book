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
   <div>Color: <select name="hue">
    <option value="120">Green</option>
    <option value="0">Red</option>
    <option value="240">Blue</option>
   </select></div>
   <div>Pages: <select name="pages">
    <option value="even">Even</option>
    <option value="odd">Odd</option>
   </select></div>
   <input type="submit">
   </fieldset>
  </form>
 </body>
</html>

