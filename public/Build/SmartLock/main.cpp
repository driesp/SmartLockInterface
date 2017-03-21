#include "mbed.h"
#include "ble/BLE.h"

#include "deviceinfo.h"

/*Variable for storing the password when received*/
volatile char password[15];

/**/
static uint8_t writeValue[20] = {0};
WriteOnlyArrayGattCharacteristic<uint8_t, sizeof(writeValue)> writeChar(write_uuid, writeValue);

/* Set up custom service */
GattCharacteristic *characteristics[] = {&writeChar};
GattService passwordService(base_uuid, characteristics, sizeof(characteristics) / sizeof(GattCharacteristic *));


void openStrike()
{
    printf("Opening Lock!\n\r");
    strike = 1;
    wait(5);
    strike = 0;
    printf("Closing Lock!\n\r");
}

/*
 *  Restart advertising when phone app disconnects
*/
void disconnectionCallback(const Gap::DisconnectionCallbackParams_t *)
{
    BLE::Instance(BLE::DEFAULT_INSTANCE).gap().startAdvertising();
    printf("Device Disconnected!\n\r");
}

/*
 *  Handle writes to writeCharacteristic
*/
void writeCharCallback(const GattWriteCallbackParams *params)
{
    printf("Data Received!\n\r");
    /* Check to see what characteristic was written, by handle */
    if(params->handle == writeChar.getValueHandle()) {
        char input[15];
        sprintf(input, "%s", params->data);
        if(strcmp(PASSWORD, input) == 0 ) {
            printf("Password Is Correct");
            printf("\n\r");
            openStrike();
        } else {
            printf("Password Is Incorrect");
            printf("\n\r");
        }
    }
}




/*
 * Initialization callback
 */
void bleInitComplete(BLE::InitializationCompleteCallbackContext *params)
{
    BLE &ble          = params->ble;
    ble_error_t error = params->error;

    if (error != BLE_ERROR_NONE) {
        return;
    }

    ble.gap().onDisconnection(disconnectionCallback);
    ble.gattServer().onDataWritten(writeCharCallback);

    /* Setup advertising */
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::BREDR_NOT_SUPPORTED | GapAdvertisingData::LE_GENERAL_DISCOVERABLE); // BLE only, no classic BT
    ble.gap().setAdvertisingType(GapAdvertisingParams::ADV_CONNECTABLE_UNDIRECTED); // advertising type
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::COMPLETE_LOCAL_NAME, (uint8_t *)DEVICE_NAME, sizeof(DEVICE_NAME)); // add name
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::COMPLETE_LIST_16BIT_SERVICE_IDS, (uint8_t *)base_uuid_rev, sizeof(base_uuid_rev)); // UUID's broadcast in advertising packet
    ble.gap().setAdvertisingInterval(50); // 50ms.

    /* Add our custom service */
    ble.addService(passwordService);

    /* Start advertising */
    ble.gap().startAdvertising();
}

/*
 *  Main loop
*/
int main(void)
{
    /* initialize stuff */
    printf("\n\r********* Starting Main Loop *********\n\r");

    BLE& ble = BLE::Instance(BLE::DEFAULT_INSTANCE);
    ble.init(bleInitComplete);

    while (ble.hasInitialized()  == false) {
        /* spin loop */
    }
    button.rise(&openStrike);
    printf("\n\r**************************************\n\r");
    printf("DEVICE NAME: %s\n\r",  DEVICE_NAME);
    printf("SERVICE UUID: %02x%02x%02x%02x-%02x%02x-%02x%02x-%02x02%x-%02x%02x%02x%02x%02x%02x\n\r",base_uuid[0],base_uuid[1],base_uuid[2],base_uuid[3],base_uuid[4],base_uuid[5],base_uuid[6],base_uuid[7],base_uuid[8],base_uuid[9],base_uuid[10],base_uuid[11],base_uuid[12],base_uuid[13],base_uuid[14],base_uuid[15]);
    printf("WRITE UUID: %02x%02x%02x%02x-%02x%02x-%02x%02x-%02x02%x-%02x%02x%02x%02x%02x%02x\n\r",write_uuid[0],write_uuid[1],write_uuid[2],write_uuid[3],write_uuid[4],write_uuid[5],write_uuid[6],write_uuid[7],write_uuid[8],write_uuid[9],write_uuid[10],write_uuid[11],write_uuid[12],write_uuid[13],write_uuid[14],write_uuid[15]);
    printf("\r**************************************\n\r");

    /* Infinite loop waiting for BLE interrupt events */
    while (true) {
        ble.waitForEvent(); /* Save power */
    }
}