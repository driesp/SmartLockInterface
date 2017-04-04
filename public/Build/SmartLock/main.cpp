#include "mbed.h"
#include "ble/BLE.h"
#include "SmartLockService.h"

BLE ble;

/*Variable for storing the password when received*/
volatile char password[15];

/*
 *  Restart advertising when phone app disconnects
*/
void disconnectionCallback(const Gap::DisconnectionCallbackParams_t *)
{
    BLE::Instance(BLE::DEFAULT_INSTANCE).securityManager().purgeAllBondingState();
    BLE::Instance(BLE::DEFAULT_INSTANCE).gap().startAdvertising();
    printf("Device Disconnected!\n\r");
}
void connectionCallback(const Gap::ConnectionCallbackParams_t *params)
{
    printf("Connected!\r\n");
}
void passkeyDisplayCallback(Gap::Handle_t handle, const SecurityManager::Passkey_t passkey)
{
    printf("Input passKey: ");
    for (unsigned i = 0; i < Gap::ADDR_LEN; i++) {
        printf("%c ", passkey[i]);
    }
    printf("\r\n");
}

void securitySetupCompletedCallback(Gap::Handle_t handle, SecurityManager::SecurityCompletionStatus_t status)
{
    if (status == SecurityManager::SEC_STATUS_SUCCESS) {
        printf("Security success\r\n");
    } else {
        printf("Security failed\r\n");
    }
}

void openHold()
{
    printf("Opening Lock!\n\r");
    strike = 1;
}
void closeHold()
{
    strike = 0;
    printf("Closing Lock!\n\r");
}

/*
 *  Main loop
*/
int main(void)
{
    /* initialize stuff */
    printf("\n\r********* Starting Main Loop *********\n\r");

    button.fall(&openHold);
    button.rise(&closeHold);

    ble.init();

    ble.securityManager().init(true, true, SecurityManager::IO_CAPS_DISPLAY_ONLY, (const uint8_t *)  BONDING );
    ble.securityManager().onPasskeyDisplay(passkeyDisplayCallback);
    ble.securityManager().onSecuritySetupCompleted(securitySetupCompletedCallback);
    ble.gap().onDisconnection(disconnectionCallback);
    ble.gap().onConnection(connectionCallback);

    SmartLockService smService(ble);

    /* Setup advertising */
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::BREDR_NOT_SUPPORTED | GapAdvertisingData::LE_GENERAL_DISCOVERABLE); // BLE only, no classic BT
    ble.gap().setAdvertisingType(GapAdvertisingParams::ADV_CONNECTABLE_UNDIRECTED); // advertising type
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::COMPLETE_LOCAL_NAME, (uint8_t *)DEVICE_NAME, sizeof(DEVICE_NAME)); // add name
    ble.gap().accumulateAdvertisingPayload(GapAdvertisingData::COMPLETE_LIST_16BIT_SERVICE_IDS, (uint8_t *)base_uuid_rev, sizeof(base_uuid_rev)); // UUID's broadcast in advertising packet
    ble.gap().setAdvertisingInterval(100); // 100ms.

    ble.gap().startAdvertising();

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
