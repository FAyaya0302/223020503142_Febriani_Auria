// PROGRAM YANG ERROR

// void main() {

//   // Meminta pengguna untuk memasukkan banyak bilangan
//   stdout.write('Masukkan banyak bilangan: ');
//   int n = int.parse(stdin.readLineSync()!);
//   int total = 0;

//   // Meminta pengguna untuk memasukkan bilangan sebanyak n kali
//   for (int i = 1; i <= n; i++) {
//     stdout.write('Masukkan bilangan ke-$i: ');
//     int bilangan = int.parse(stdin.readLineSync()!);
//     total == bilangan;
//   }

//   // Menghitung rata-rata dan mencetak hasilnya
//   double rata = total / n;
//   print('Rata-rata: $rata');
// }


// BERIKUT PROGRAM YANG BENAR

import 'dart:io';

void main() {
  stdout.write('Masukkan banyak bilangan: ');

  // Parse() untuk melakukan konversi dari string ke number(int atau double)
  int n = int.parse(stdin.readLineSync()!); 
  int total = 0;

  for (int i = 1; i <= n; i++) {
    stdout.write('Masukkan bilangan ke-$i: ');
    int bilangan = int.parse(stdin.readLineSync()!);
    total += bilangan; // Menggunakan += untuk menambahkan bilangan ke total
  }

  double rata = total / n;
  print('Rata-rata: $rata');
}