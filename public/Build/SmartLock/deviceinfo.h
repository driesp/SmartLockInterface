/*Indication LED for testing purposes. Used with BLE400 Motherboard. LED1 -> LED0*/
DigitalOut              strike(LED1,0);
/*Interrupt pin for opening door by its own. PO_16 is KEY1*/
InterruptIn             button(P0_16);

static const uint8_t    base_uuid[]             = {0x71, 0x3D, 0, 0, 0x50, 0x3E, 0x4C, 0x75, 0xBA, 0x94, 0x31, 0x48, 0xF1, 0x8D, 0x94, 0x1E};
static const uint8_t    write_uuid[]            = {0x71, 0x3D, 0, 3, 0x50, 0x3E, 0x4C, 0x75, 0xBA, 0x94, 0x31, 0x48, 0xF1, 0x8D, 0x94, 0x1E};
static const uint8_t    base_uuid_rev[]         = {0x1E, 0x94, 0x8D, 0xF1, 0x48, 0x31, 0x94, 0xBA, 0x75, 0x4C, 0x3E, 0x50, 0, 0, 0x3D, 0x71};

/*Device Name*/ 
const static char       DEVICE_NAME[]           = "A00001";
/*Device Password*/ 
const char              PASSWORD[]              = "sGk7Iv2ailcwLYP";
/*Device Bonding Password*/ 
const char              BONDING[]              = "814307";
