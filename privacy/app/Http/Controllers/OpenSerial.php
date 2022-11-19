<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class OpenSerial extends Controller
{
    //
    const portName = 'COM4';
	const baudRate = 9600;
	const bits = 8;
	const spotBit = 1;

    public function test()
    {
        $data = fopen('E:\text_timbang.txt','r');
		echo fgets($data);
		fclose($data);
		exit;
        // $file = 'ftp://text_timbang.txt';
        // $data = file_get_contents($file, FILE_USE_INCLUDE_PATH);

		//baca baris pertama text file
        $data = fopen('E:/text_timbang.txt','r');
    	// $data = fopen("\\.\COM5",'r');
		echo fgets($data);
		fclose($data);

		//tulis ke dalam text file
		// $buat = fopen('testos22.txt','w');
  //    	echo fwrite($buat,"Hallooo...");
		// fclose($buat);

		//baca baris terakhir text file
		// $data = fopen('testos22.txt', 'r');
		// fseek($data, -1, SEEK_END);
		// echo fgetc($data);
		// fclose($data);

		//mengosongkan isi text file
		// $fh = fopen( 'testos22.txt', 'w' );
		// echo fwrite($fh,"");
		// fclose($fh);

		exit();

	    if(!extension_loaded('dio'))
		{
		 echo( "PHP Direct IO does not appear to be installed for more info see: http://www.php.net/manual/en/book.dio.php" );
		 exit;
		}

    	// dd($this::portName);
	    try 
		{
		//the serial port resource
		$bbSerialPort;
		
		// echo(  "Connecting to serial ".$this::portName."port" );
		
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
		{ 
			$bbSerialPort = dio_open($this::portName,O_RDONLY);
			//we're on windows configure com port from command line
			
			$windows = sprintf("mode {%s} baud={%s} data={%s} stop={%s} parity=n xon=on",$this::portName, $this::baudRate,$this::bits,$this::spotBit);
			// exec("mode {portName} baud={baudRate} data={bits} stop={spotBit} parity=n xon=on");
			exec($windows);
		} 
		else //'nix
		{
			$bbSerialPort = dio_open($this::porName, O_RDWR | O_NOCTTY | O_NONBLOCK );
			dio_fcntl($bbSerialPort, F_SETFL, O_SYNC);
			//we're on 'nix configure com from php direct io function
			dio_tcsetattr($bbSerialPort, array(
				'baud' => $baudRate,
				'bits' => $bits,
				'stop'  => $spotBit,
				'parity' => 0
			));
		}
		
		if(!$bbSerialPort)
		{
			echo( "Could not open Serial port {$portName} ");
			exit;
		}
		
		$data = dio_read($bbSerialPort, 100); //this is a blocking call
		// $data = dio_open($this::portName,O_RDONLY);
			if ($data) {
				// $data = fopen('COM5:','r');
				// // $data2 = substr($data, 4,9);
				// $data = fopen('asd.txt','r');
				echo( $data );
		}

		dio_close($bbSerialPort);

		// $runForSeconds = new \DateInterval("PT10S"); //10 seconds
		// $endTime = (new \DateTime())->add($runForSeconds);

		// while (new \DateTime() < $endTime) {
		
		// 	$data = dio_read($bbSerialPort, 1); //this is a blocking call
		// 	if ($data) {
		// 		echo( $data );
		// 	}
		// 	dio_close($bbSerialPort);
		// }
		} 
		catch (Exception $e) 
		{
		echo(  $e->getMessage() );
		exit(1);
		} 
   }

   public function echoFlush($string)
	{
		echo $string . "\n";
		flush();
		ob_flush();
	}
}
