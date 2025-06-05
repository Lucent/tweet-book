Firefox orphan control was broken after 77.0.1 and then fixed before 127.0.

Install font/*

Printers & Scanners > Print Server Properties > Create a new form > Trade paperback > 6.25 by 9.25

git clone https://github.com/mwichary/twitter-export-image-fill.git

Firefox (not MacOS, can't get 0 margins)
All this can be bypassed when Firefox supports @page :left, :right. https://bugzilla.mozilla.org/show_bug.cgi?id=813187

>	File, Page Setup
> >		Format & Options: Print Background (colors & images) [or non-black text like time will be in black]
> >		Margins & Header/Footer: all 0.0, blank

>	Set pages to Odd in generator form.
>	File, Print
> >		Adobe PDF, Trade paperback, Press Quality (for higher user icon DPI)
> >		odd.pdf
		
>	Set pages to Even in generator form.
>	File, Print
> >		Adobe PDF, Press Quality (for nice user icon)
> >		even.pdf

>   pdftk A=odd.pdf B=even.pdf shuffle Aodd Beven output interleaved.pdf

>	Inspect with View, Page Display, Two Page Scrolling & Show Cover Page in Two Page View

>	Add and name footers, Arial, 10pt
>	>	"left": Page Range Options: even 3 onward, bottom: 0.45, left/right: 0.35.
>	>	"Right": Page Range Options: odd 3 onward, bottom: 0.45, left/right: 0.35.

>	Set Deeper black, 270%? Figure out bleed/margin/padding and svg img alignment and 100% width to stay out of bleed

Showstoppers
>	All browsers: rasterized background SVG
>	Chrome: box-overflow clone fails on flex
>	Firefox: @page :left and :right nonexistant
