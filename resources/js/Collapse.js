$(function() {
    $('.CollapseButton').on('click', function() {
        var TargetDiv = $(this).data("target");
        TargetDiv = "#"+TargetDiv;

        $(TargetDiv).toggle("fast");
    });
});