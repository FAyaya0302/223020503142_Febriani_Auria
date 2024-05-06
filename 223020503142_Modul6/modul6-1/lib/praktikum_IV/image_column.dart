import 'package:flutter/material.dart';

class image_column extends StatelessWidget {
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
    
      // body: Column(
      //   children: [
      //     Center(
      //       child: Container(
      //         width: 360,
      //         height: 200,
      //         decoration: BoxDecoration(
      //           borderRadius: BorderRadius.circular(20),
      //           color: Colors.grey,
      //           image: DecorationImage(
      //             image: AssetImage("lib/img/peralatan_belajar.jpg"),
      //             fit: BoxFit.cover,
      //           ),
      //         ),
      //       ),
      //     ),
      //     Container(
      //       child: Text("11 Oktober 2022, 15.30 WIIB"),
      //     ),
      //   ],
      // ),
      // Image(
      //   image: AssetImage("lib/img/peralatan_belajar.jpg"),
      body: Padding(
        
        padding: const EdgeInsets.only(
          top: 50, 
          bottom: 28,
          right: 28,
          left: 28,
        ),
        child: Column(
          children: [
            Container(
              width: 360,
              height: 200,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(10),
                color: Colors.grey,
                image: DecorationImage(
                  image: AssetImage("lib/img/peralatan_belajar.jpg"),
                  fit: BoxFit.cover,
                ),
              ),
            ),
            SizedBox(height: 15),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  // alignment: Alignment.bottomLeft,
                  child: Text("11 Oktober 2022, 15:30 WIB",
                    style: TextStyle(
                      fontSize: 15,
                    ),
                  ),
                ),
                SizedBox(height: 5),
                Container(
                  // alignment: Alignment.bottomLeft,
                  child: Text("Buat Website hanya 7 menit dengan plugin ini!",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 21,
                      letterSpacing: 0.5,
                      // textBaseline:
                      height: 1.3,
                    ),
                  ),
                ),
                SizedBox(height: 14),
                Container(
                  // alignment: Alignment.bottomLeft,
                  child: Text(
                    "Sekarang buat website cukup hitungan menit kami "
                    "Tenang, kami akan memandu Anda mengikuti "
                    "semua langkah-langkahnya dengan penjelasan yang "
                    "lengkap dan gampang diikuti. Anda juga tidak perlu "
                    "khawatir dengan hal-hal teknisnya, karena "
                    "semuanya bisa Anda lakukan tanpa coding ",
                      style: TextStyle(
                        fontSize: 15,

                      ),
                  ),
                ),
              ],
            )
          
          ],
        ),
      ),
    );
  }
}
