var chart = AmCharts.makeChart( "DountJS", {
  "type": "pie",
  "theme": "none",
  "dataProvider": [ 
    @foreach ($countArray['eventChart'] as $element){
      "months": "{!! $element['new_date'] !!}",
      "counts": "{!! $element['IDdata'] !!}",
      "color": "#36b9cc",
    },
    @endforeach
  {
    "title": "New",
    "value": 4852
  }, {
    "title": "Returning",
    "value": 9899
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );