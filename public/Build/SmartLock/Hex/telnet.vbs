set OBJECT=WScript.CreateObject("WScript.Shell")
WScript.sleep 500
OBJECT.SendKeys "reset{ENTER}"
WScript.sleep 50
OBJECT.SendKeys "halt{ENTER}"
WScript.sleep 50
OBJECT.SendKeys "nrf51 mass_erase{ENTER}"
WScript.sleep 50
OBJECT.SendKeys "flash write_image program.hex 0{ENTER}"
WScript.sleep 20000
OBJECT.SendKeys "reset{ENTER}"
WScript.sleep 1000
OBJECT.SendKeys "exit{ENTER}"
WScript.sleep 1000
OBJECT.SendKeys "{ENTER}"
