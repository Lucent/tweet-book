// Complements: Planet PDF (http://www.planetpdf.com/)
// Source: https://forums.adobe.com/thread/286654?start=40&tstart=0
// Modified by
//   - Christian Sass for Acrobat XI compatibility
//   - Bernd Alheit for newer Acrobat compatibility
//   - amoshydra for comsolidating solution

// Add a menu item to reverse all pages in the active document
app.addToolButton({ cName: "Collate", cLabel: "Collate", cExec: "trustedCollatePages();", cEnable: "event.rc = (event.target != null);"});


// Collating pages
/*
  Title: Collate Document
  Purpose: User is prompted to select document to insert/collate.
  Author: Sean Stewart, ARTS PDF, www.artspdf.com
*/
trustedCollatePages = app.trustedFunction(function()
{
  app.beginPriv(); // Explicitly raise privileges
  // create an array to use as the rect parameter in the browse for field

  var arRect = new Array();
  arRect[0] = 0;
  arRect[1] = 0;
  arRect[2] = 0;
  arRect[3] = 0;

  // create a non-visible form field to use as a browse for field
  var f = this.addField("txtFilename", "text", this.numPages - 1, arRect);

  f.delay = true;
  f.fileSelect = true;
  f.delay = false;

  // user prompted to select file to collate the open document with
  app.alert("Select the PDF file to merge with")

  // open the browse for dialog
  f.browseForFileToSubmit();

  var evenDocPath = f.value;

  var q = this.numPages;

  // insert pages from selected document into open document
  for (var i = 0;i < q; i++) {
      var j = i*2;
      this.insertPages(j, evenDocPath, i);
  }

  // remove unused field
  this.removeField("txtFilename");
  app.endPriv();
})
