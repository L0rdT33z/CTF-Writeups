# The Doge Trader Evidence

Open labhard-ftk.001 with AccessData FTK Imager and locate to Recycle Bin.

![](attachments/1.jpg)

Export NomoreShitCoin.exe and run it on VM

![](attachments/2.jpg)

Run until you found compressed.zip in C:\Windows\System32

![](attachments/3.jpg)

It's password protected zip file.

Check detail with 

```
bkcrack -L compressed.zip
```

![](attachments/4.jpg)

It's ZipCrypto Deflate. This one can use Known Plaintext Attack.

You need to get some file that exist in encrypted archive to perform Known Plaintext Attack.

I choose libcrypto-1_1-x64.dll

You can get it from AccessData FTK Imager. Locate to C:\Windows\System32.

![](attachments/5.jpg)

It's ZipCrypto "Deflate" so you need to try to find a compression method that compressed size = packed size in encrypted archive - 12.

I compress it using 7zip with these settings.

![](attachments/6.jpg)

Check it with bkcrack

```
./bkcrack -L compressed.zip
./bkcrack -L libcrypto-1_1-x64.zip
```

![](attachments/7.jpg)

1419254-1419242 = 12

So it's correct. Let's crack it with bkcrack.

```
./bkcrack -C compressed.zip -c libcrypto-1_1-x64.dll -P libcrypto-1_1-x64.zip -p libcrypto-1_1-x64.dll
```

![](attachments/8.jpg)

The key is 34b7ec06 5d3a6554 9e7b2fdf

I'll change zip password to 123456

```
./bkcrack -C compressed.zip -k 34b7ec06 5d3a6554 9e7b2fdf -U cracked.zip 123456
```

![](attachments/9.jpg)

You can extract flag.txt but it's microsoft word document.

![](attachments/10.jpg)

You can unzip it.

![](attachments/11.jpg)

Found pastebin link inside \./word/_rels/settings.xml.rels

![](attachments/12.jpg)

It's base-64 encoded string. After decoded it you'll get flag.

![](attachments/13.jpg)



![](attachments/14.jpg)

<b>Forensics{D0G3Co1N2T1n3M@@n}</b>
