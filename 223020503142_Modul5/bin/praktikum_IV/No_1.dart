
void main() {
  Map<String, List<int>> mapWithList = {
    'list1': [1, 2, 3],
    'list2': [4, 5, 6]
  };

  print('Map dengan list:');
  mapWithList.forEach((key, value) {
    print('$key: $value');
  });
}
