#include "mbed.h"
#include "BLE.h"
#include "deviceinfo.h"

static uint8_t writeValue[20] = {0};

class SmartLockService {
public:

    SmartLockService(BLE &_ble) :
        ble(_ble),
        password(write_uuid, writeValue) {
        setupService();
    }
    
    void openStrike()
    {
        printf("Opening Lock!\n\r");
        strike = 1;
        wait(5);
        strike = 0;
        printf("Closing Lock!\n\r");
    }
 
    virtual void onDataWritten(const GattWriteCallbackParams *params) {
        printf("Data Received!\n\r");
        /* Check to see what characteristic was written, by handle */
        if(params->handle == password.getValueHandle()) {
            char input[15];
            sprintf(input, "%s", params->data);
            if(strcmp(PASSWORD, input) == 0 ) {
                printf("Password Is Correct");
                printf("\n\r");
                SmartLockService::openStrike();
            } else {
                printf("Password Is Incorrect");
                printf("\n\r");
            }
        }
    }
 
private:
    void setupService(void) {
        static bool serviceAdded = false; /* We should only ever need to add the heart rate service once. */
        if (serviceAdded) {
            return;
        }
        
        password.requireSecurity(SecurityManager::SECURITY_MODE_ENCRYPTION_WITH_MITM);
 
        GattCharacteristic *charTable[] = {&password};
        GattService         smService(base_uuid, charTable, sizeof(charTable) / sizeof(GattCharacteristic *));
        ble.gattServer().addService(smService);
        serviceAdded = true;
 
        ble.gattServer().onDataWritten(this, &SmartLockService::onDataWritten);
    }
 
private:
    BLE                 &ble;
    
    WriteOnlyArrayGattCharacteristic<uint8_t, sizeof(writeValue)> password;
};