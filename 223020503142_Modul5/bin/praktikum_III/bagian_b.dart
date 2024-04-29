// PROGRAM YANG ERROR

// void main() {
//   stdout.write('Masukkan teks: ');
//   String teks = stdin.readLineSync()!;
//   List<String> kata = teks.split(' ');
//   String jumlahKata = kata.toString();
//   print('Jumlah kata dalam teks: $jumlahKata');
// }

// BERIKUT PROGRAM YANG BENAR

import 'dart:io';

void main() {
  stdout.write('Masukkan teks: ');
  String teks = stdin.readLineSync()!;
  List<String> kata = teks.split(' ');
  int jumlahKata = kata.length; // Menggunakan kata.length untuk menghitung jumlah kata

  print('Jumlah kata dalam teks: $jumlahKata');
}
