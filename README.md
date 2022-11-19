# scale_depo
web based scale system for trucking scale integrated with vb terminal application

How to use it:
First of all, execute the <b>timbang_terminal.exe</b> in your desktop, it's a VB application that running in background to write into text named 'text_timbang.txt' 
in your public/user folder of drive C. It automatically read from COM1 port which will be used to connect the Serial cable into the digital scale and then
capture the weight into the 'text_timbang.txt'.

If you put this project to hosting, it will need some access to read local folder and here i am using chrome browser web server to create some local link
that accessible from hosting that is look like: http://127.0.0.1:8887/text_timbang.txt

Next open up transaction create some transaction, store it. 
Currently the scale function only in Edit form (i'm not adding it to store form yet) so the next is press the edit button, put some weight in digital scale until the weight shown in the LED of digital scale.
Next press the Timbang button to get the scale value.

<i>Note: I've also upload the VB app for the timbang_terminal in case you want to change the COM port from the source code.</i>

<u>User web login</u>:<br>
<b>username</b>: Superadministrator<br>
<b>password</b>: super123
