import 'package:flutter/material.dart';

class container_dua extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.blue,
        shadowColor: Colors.black,
        elevation: 5,
        title: Text("Flutter Code Sample", style: TextStyle(color: Colors.white)),
      ),
      body: Row(
        children: [
          Container(
            // double.infinity digunakan untuk membuat lebarnya menyesuakan halaman yang ada
            width: 80,  
            height: 100,
            color: Colors.lightGreenAccent,
            child: Center(
              child: Text("Container 1")
            ),
          ),
           Container(
            // double.infinity digunakan untuk membuat lebarnya menyesuakan halaman yang ada
            width: 80,  
            height: 100,
            color: Colors.lightBlue[400],
            child: Center(
              child: Text("Container 2")
            ),
          )
        ],
      )
    );
  }
}
