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
   <div>Username: <input type="text" name="user" value="LucidiaLyrae"></div>
   <div>Start year: <input type="date" name="datestart"></div>
   <div>End year: <input type="date" name="dateend"></div>
   <div>Hide name: <input type="checkbox" name="compact"></div>
   <div>Retweets: <input type="checkbox" name="retweets"></div>
   <div>Replies: <input type="checkbox" name="replies"></div>
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

