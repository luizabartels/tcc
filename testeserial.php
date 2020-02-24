
<?php
/*
primeira tentativa. não funcionou prq a classe de php serial não está implementada para ler dado no windows
include 'PhpSerial.php';
$serial = new PhpSerial;
$serial->deviceSet("COM2");
$serial->deviceOpen();

sleep(2);
 
Enviar
$serial->sendMessage("Hello !");
echo 'enviado';


global $ler_serial;
$ler_serial = $serial->readPort();

echo $ler_serial;
 
//Fechando a conexao
$serial->deviceClose();
 
// Tempo de espera para recever dados da Serial
sleep(1);



$output = exec("mode COM2: BAUD=96000");
$fp = fopen("COM2", "r+");

if (!$fp)
{
  exit("Unable to establish a connection");
}
// RX form PC**************
$t = 'Hello';

// TX to Arduino****************
$writtenBytes = fputs($fp, $t);

echo 'enviado';

$tt = stream_get_line($fp,8);

echo $tt;

fclose($fp);



$output = exec("mode COM2: BAUD=115200 PARITY=N data=8 stop=1 XON=off TO=on dtr=off odsr=off octs=off rts=on idsr=off");
$fp = fopen("COM2", "r+");
if (!$fp)
{
  exit("Unable to establish a connection");
}
// RX form PC**************
$t = 'teste';
// TX to Arduino****************
$writtenBytes = fputs($fp, $t);
sleep(1); 
// RX from Arduino**************
$j=0;
$dataset1 = [];
$buffer=stream_get_line($fp,100,"\n");
// TX to PC***************
echo $buffer;
$piecesa = explode(",", $buffer);
foreach ($piecesa as $value) {  
    $dataset1[$j] = $value;
    $j++;
}
$myJSON = json_encode($dataset1);
echo $myJSON;
fclose($fp);
*/

// Linux $comPort = "/dev/ttyACM0";
$comPort = "COM2";

include "PhpSerial.php";
$serial = new phpSerial;
$serial->deviceSet($comPort);

// On Windows (10 only?) all mode settings must be done in one go.
$cmd = "mode " . $comPort . " baud=115200 parity=n data=8 stop=1 to=off xon=off";
$serial->_exec($cmd);
$serial->deviceOpen();

echo "Waiting for data...\n";
sleep(2); // Wait for Arduino to finish booting.


while(1)
{
  $read = $serial->readPort();

  if (strlen($read)!=0)
  {
    $fp = fopen("data.txt","w");
    if ($fp!=false)
    {
      fwrite($fp,trim($read));
      fclose($fp);
    }
  }
}

?>
