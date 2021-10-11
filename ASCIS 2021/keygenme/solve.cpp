#include<stdio.h>
#include<strings.h>

unsigned int FUN_004014d0(char *param_1)
{
  char *pcVar1;
  unsigned int uVar2;
  size_t sVar3;
  unsigned long uVar4;
  
  sVar3 = strlen(param_1);
  if (sVar3 != 0) {
    uVar2 = 0;
    uVar4 = 0;
    do {
      pcVar1 = param_1 + uVar4;
      uVar4 = (unsigned long)((int)uVar4 + 1);
      uVar2 = (uVar2 + (int)*pcVar1 >> 0xc | (uVar2 + (int)*pcVar1) * 0x100000) ^ 0x55aa;
    } while (uVar4 < sVar3);
    return uVar2;
  }
  return 0;
}

int main(void){
  unsigned int uVar1,uVar6;
  unsigned long uVar7,uVar8;
  char local_198[] = "Anne Morgan"; // INPUT NAME
  uVar1 = FUN_004014d0(local_198);
  if (strlen(local_198) == 0) {
    uVar7 = 0;
  }
  else {
    uVar8 = 0;
    uVar7 = 0;
    do {
      uVar6 = (int)uVar7 + (int)(char)local_198[uVar8];
      uVar8 = (unsigned long)((int)uVar8 + 1);
      uVar7 = (unsigned long)(uVar6 >> 4 | uVar6 * 0x10000000);
    } while (uVar8 < strlen(local_198));
  }
  printf("Serial: %08X-%08X",uVar7,(unsigned long)uVar1);
}
