(function($) {
    var names = [];
    $.get('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml',{
        cache: true
    }).done(function(result) {
        var parsedResult = jsyaml.load(result);
        $(parsedResult.icons).each(function(id, icon) {
            names.push(icon.id);
        });
        $('.icp-auto').entwine({
            onmatch: function(){
                $('.icp-auto').iconpicker({
                    icons: names,
                    animation: false,
                    hideOnSelect: true
                });
                this._super();
            },
            onunmatch: function() {
                this._super();
            }
        });
    });
})(jQuery);
