Firefox (not MacOS, can't get 0 margins)
	File
		Page Setup
			Format & Options: Print Background (colors & images) [or non-black text like time will be in black]
			Margins & Header/Footer: all 0.0, blank

	about:config
		print.printer_Adobe_PDF.print_oddpages:		true
		print.printer_Adobe_PDF.print_evenpages:	false

	http://dayah.com/tweetbook/?years=2007,2012,2013,2014&pages=odd

	File
		Print
			Adobe PDF, Trade paperback, Press Quality (for higher user icon DPI)
			odd.pdf
		
	about:config
		print.printer_Adobe_PDF.print_oddpages:		false
		print.printer_Adobe_PDF.print_evenpages:	true
	
	http://dayah.com/tweetbook/?years=2007,2012,2013,2014&pages=even

	File
		Print
			Adobe PDF, Press Quality (for nice user icon)
			even.pdf
				
put CollatePages.js in %APPDATA%\Adobe\Acrobat\Privileged\DC\JavaScripts
Acrobat DC
	open odd.pdf
	Tools, Add-ons, Add-on Tools, Collate
	Select even.pdf
	Save as complete.pdf

	Inspect with View, Page Display, Two Page Scrolling & Show Cover Page in Two Page View
	Confirm gutter is bigger in the middle than outside

	Remove Page number 0 from Title

	Set Deeper black, 270%? Figure out bleed/margin/padding and svg img alignment and 100% width to stay out of bleed

Showstoppers
	All browsers: rasterized background SVG
	Chrome: box-overflow clone fails on flex
	Firefox: @page :left and :right nonexistant
	Edge: Can't print backgrounds at all
