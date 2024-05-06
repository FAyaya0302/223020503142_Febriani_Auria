import 'package:flutter/material.dart';

class bagian_a extends StatelessWidget {
  const bagian_a({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: ElevatedButton(
          onPressed: (){},
          child: Text("Mulai", style: TextStyle(color: Colors.white),), 
          style: ElevatedButton.styleFrom(
            backgroundColor: Colors.blue[700],
            minimumSize: Size(200, 40),
          ),
        ),
      )
    );
  }
}


