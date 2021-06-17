Last Firefox with proper orphan control: https://ftp.mozilla.org/pub/firefox/releases/77.0.1/win64/en-US/Firefox%20Setup%2077.0.1.exe

Install font/*

Printers & Scanners > Print Server Properties > Create a new form > Trade paperback > 6.25 by 9.25

git clone https://github.com/mwichary/twitter-export-image-fill.git

git clone https://github.com/twitter/twitter-text.git

Firefox (not MacOS, can't get 0 margins)
All this can be bypassed when Firefox supports @page :left, :right. https://bugzilla.mozilla.org/show_bug.cgi?id=813187

>	File, Page Setup
> >		Format & Options: Print Background (colors & images) [or non-black text like time will be in black]
> >		Margins & Header/Footer: all 0.0, blank

> 	about:config
> > 	print.printer_Adobe_PDF.print_oddpages:		true
> > 	print.printer_Adobe_PDF.print_evenpages:	false

>	Set pages to Odd in generator form.

>	File, Print
> >		Adobe PDF, Trade paperback, Press Quality (for higher user icon DPI)
> >		odd.pdf
		
>	about:config
> >		print.printer_Adobe_PDF.print_oddpages:		false
> >		print.printer_Adobe_PDF.print_evenpages:	true
	
>	Set pages to Even in generator form.

>	File, Print
> >		Adobe PDF, Press Quality (for nice user icon)
> >		even.pdf
				
put CollatePages.js in C:\Program Files (x86)\Adobe\Acrobat DC\Acrobat\Javascripts
Acrobat DC
>	open odd.pdf
>	Tools, JavaScript, Debugger, paste `app.addToolButton` line, Shift+Enter
>	Tools, Add-on Tools, Collate
>	Select even.pdf
>	Save as complete.pdf

>	Inspect with View, Page Display, Two Page Scrolling & Show Cover Page in Two Page View
>	Confirm gutter is smaller in the middle, opposite of a book

>	Remove Page number 0 from Title
>	Add and name footers, Arial, 10pt
>	>	"left": Page Range Options: even 3 onward, bottom: 0.45, left/right: 0.35.
>	>	"Right": Page Range Options: odd 3 onward, bottom: 0.45, left/right: 0.35.
>	If there's a weird unembeddable font on last page, extract and resave in Illustrator.

>	Set Deeper black, 270%? Figure out bleed/margin/padding and svg img alignment and 100% width to stay out of bleed

Showstoppers
>	All browsers: rasterized background SVG
>	Chrome: box-overflow clone fails on flex
>	Firefox: @page :left and :right nonexistant
