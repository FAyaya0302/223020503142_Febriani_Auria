void main() {
  List<Map<String, dynamic>> listWithMap = [
    {'key1': 'value1', 'key2': 2},
    {'name': 'Budi Aulyansyah', 'age': 30}
  ];

  print('List dengan map:');
  listWithMap.forEach((map) {
    print('$map');
  });
}
