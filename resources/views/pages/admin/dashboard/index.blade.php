@extends('layouts_admin.main')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')
    <div class="card card-plush p-5">
        <div class="card card-bordered">
            <div class="card-body">
                <div id="kt_amcharts_3" style="height: 500px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script>
        am5.ready(function() {
            var root = am5.Root.new("kt_amcharts_3");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                layout: root.verticalLayout
            }));
            var series = chart.series.push(am5percent.PieSeries.new(root, {
                alignLabels: true,
                calculateAggregates: true,
                valueField: "value",
                categoryField: "category"
            }));

            series.slices.template.setAll({
                strokeWidth: 3,
                stroke: am5.color(0xffffff)
            });
            series.labelsContainer.set("paddingTop", 30)
            series.slices.template.adapters.add("radius", function(radius, target) {
                var dataItem = target.dataItem;
                var high = series.getPrivate("valueHigh");

                if (dataItem) {
                    var value = target.dataItem.get("valueWorking", 0);
                    return radius * value / high
                }
                return radius;
            });

            series.data.setAll(@json($course));

            // Create legend
            // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50,
                marginTop: 15,
                marginBottom: 15
            }));

            legend.data.setAll(series.dataItems);

            // Play initial series animation
            // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
            series.appear(1000, 100);

        }); // end am5.ready()
    </script>
@endsection
