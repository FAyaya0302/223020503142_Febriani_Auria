import 'package:flutter/material.dart';

class list_view extends StatelessWidget {

  List<Map<String, dynamic>> dataMahasiswa = [
    {"namaProfile": "IK", "nama": "Ikhwan Koto"    , "jurusan": "Sistem Informasi"},
    {"namaProfile": "PA", "nama": "Pake Arrayid"   , "jurusan": "Fisika"},
    {"namaProfile": "RK", "nama": "Ryan Kimo"      , "jurusan": "Olah Raga"},
    {"namaProfile": "AM", "nama": "Arif Mahran"    , "jurusan": "Biologi"},
    {"namaProfile": "NH", "nama": "Nurrahman Hado" , "jurusan": "Sistem Kompuetr"},
    {"namaProfile": "AN", "nama": "Ade Nuri"       , "jurusan": "Psikologi"},
    {"namaProfile": "FC", "nama": "Fitriani Chairi", "jurusan": "Ilmu Komputer"},
    {"namaProfile": "EA", "nama": "Elsa Aprilio"   , "jurusan": "Teknik Mesin"},
    {"namaProfile": "IK", "nama": "Ikhwan Koto"    , "jurusan": "Sistem Informasi"},
    {"namaProfile": "PA", "nama": "Pake Arrayid"   , "jurusan": "Fisika"},
    {"namaProfile": "RK", "nama": "Ryan Kimo"      , "jurusan": "Olah Raga"},
    {"namaProfile": "AM", "nama": "Arif Mahran"    , "jurusan": "Biologi"},
    {"namaProfile": "NH", "nama": "Nurrahman Hado" , "jurusan": "Sistem Kompuetr"},
    {"namaProfile": "AN", "nama": "Ade Nuri"       , "jurusan": "Psikologi"},
    {"namaProfile": "FC", "nama": "Fitriani Chairi", "jurusan": "Ilmu Komputer"},
    {"namaProfile": "EA", "nama": "Elsa Aprilio"   , "jurusan": "Teknik Mesin"},
    {"namaProfile": "IK", "nama": "Ikhwan Koto"    , "jurusan": "Sistem Informasi"},
    {"namaProfile": "PA", "nama": "Pake Arrayid"   , "jurusan": "Fisika"},
    {"namaProfile": "RK", "nama": "Ryan Kimo"      , "jurusan": "Olah Raga"},
    {"namaProfile": "AM", "nama": "Arif Mahran"    , "jurusan": "Biologi"},
    {"namaProfile": "NH", "nama": "Nurrahman Hado" , "jurusan": "Sistem Kompuetr"},
    {"namaProfile": "AN", "nama": "Ade Nuri"       , "jurusan": "Psikologi"},
    {"namaProfile": "FC", "nama": "Fitriani Chairi", "jurusan": "Ilmu Komputer"},
    {"namaProfile": "EA", "nama": "Elsa Aprilio"   , "jurusan": "Teknik Mesin"},
    {"namaProfile": "IK", "nama": "Ikhwan Koto"    , "jurusan": "Sistem Informasi"},
    {"namaProfile": "PA", "nama": "Pake Arrayid"   , "jurusan": "Fisika"},
    {"namaProfile": "RK", "nama": "Ryan Kimo"      , "jurusan": "Olah Raga"},
    {"namaProfile": "AM", "nama": "Arif Mahran"    , "jurusan": "Biologi"},
    {"namaProfile": "NH", "nama": "Nurrahman Hado" , "jurusan": "Sistem Kompuetr"},
    {"namaProfile": "AN", "nama": "Ade Nuri"       , "jurusan": "Psikologi"},
    {"namaProfile": "FC", "nama": "Fitriani Chairi", "jurusan": "Ilmu Komputer"},
    {"namaProfile": "EA", "nama": "Elsa Aprilio"   , "jurusan": "Teknik Mesin"},
   

  ];

  @override
  Widget build(BuildContext context) {
    // List<dataMahasiswa> mhs = [
    //   dataMahasiswa(namaProfile: "IK", nama: "Ikhwan Koto" , jurusan: "Sistem Informasi"),
    //   dataMahasiswa(namaProfile: "PA", nama: "Pake Arrayid", jurusan: "Fisika"),
    //   dataMahasiswa(namaProfile: "RK", nama: "Ryan Kimo"   , jurusan: "Olah Raga"),
    // ];

    return Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.white,
          shadowColor: Colors.black,
          elevation: 5,
          title:
              Text("ListView.Builder", style: TextStyle(
                color: Colors.black, 
                fontWeight: FontWeight.bold,)),
        ),
        body: ListView.builder(
          itemCount: dataMahasiswa.length,
          itemBuilder: (context, index) {
            return Padding(padding: EdgeInsets.all(10),
            child: Row(
              children: [
                Container(
                  width: 70,
                  height: 70,
                  decoration: BoxDecoration(
                    color: Colors.blue,
                    shape: BoxShape.circle,
                  ),
                    child: Center(
                      child: Text("${dataMahasiswa[index]["namaProfile"]}", 
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 18
                      ),
                        
                      )
                    ),
                ),
                SizedBox(width: 20),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                   
                    Container( 
                      child: Text("${dataMahasiswa[index]["nama"]}", 
                        style: TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 18
                        ),
                      ),

                    ),
                    SizedBox(height: 5),
                    Container(
                      child: Text("${dataMahasiswa[index]["jurusan"]}", 
                        style: TextStyle(
                          fontSize: 17
                        ),
                      ),
                    ),
                  ],
                ),
              ],
            ),
            );
          },
        ));
  }
}

// class dataMahasiswa {
//   String namaProfile;
//   String nama;
//   String jurusan;
//   dataMahasiswa(
//       {required this.namaProfile, required this.nama, required this.jurusan});
// }
