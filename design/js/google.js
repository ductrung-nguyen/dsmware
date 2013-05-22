/**
 * Created with JetBrains PhpStorm.
 * User: loveallufev
 * Date: 5/21/13
 * Time: 11:51 PM
 * To change this template use File | Settings | File Templates.
 */
var g_camel_loaded = false;
var g_clear_def = "Enter keywords to find products";
var g_user_msg_updater = null;
var g_delayed_images = new Array();
var g_onload = new Array();
var g_is_login = false;

function push_delayed_image(url, obj_id)
    {
        g_delayed_images.push(new Array(url, obj_id));
        }

function for_onload(f)
    {
        g_onload.push(f);
        }

if (document.addEventListener) {
    document.addEventListener('DOMContentLoaded', onStart, false);
    }
(function() {
    /*@cc_on
     try {
     document.body.doScroll('up');
     return onStart();
     } catch(e) {}
/*@if (false) @*/
if (/loaded|complete/.test(document.readyState)) return onStart();
/*@end @*/
if (!onStart.done) setTimeout(arguments.callee, 30);
})();

if (window.addEventListener) {
    window.addEventListener('load', onStart, false);
    } else if (window.attachEvent) {
    window.attachEvent('onload', onStart);
    }

var _timeoutid = null;

// scripts here to ensure any globals are declared and available to onStart()



function onStart()
    {
        // quit if this function has already been called
        if (arguments.callee.done) return;

        if (!g_camel_loaded || !Prototype)
        {
        if (_timeoutid)
        clearTimeout(_timeoutid);

        _timeoutid = setTimeout("onStart()", 30);
        return;
        }

if (_timeoutid)
clearTimeout(_timeoutid);

// flag this function so we don't do the same thing twice
arguments.callee.done = true;


document.onclick = check_login_popout;




hide_class("form.iform");
hide_class(".updating");

$$(".cross").invoke('observe', 'click', function(event) {
    var element = Event.element(event);
    var id = element.readAttribute('id').gsub('cross_','');
    field_display(id,'iform','off');
    field_display(id,'iprice','on');
    });

$$(".tick").invoke('observe', 'click', function(event) {
    var element = Event.element(event);
    var id = element.readAttribute('id').gsub('tick_','');
    var action = 'danazon';
    var locale = 'US';
    submit_iform(id,event,action,locale);
    });

$$(".iprice").invoke('observe', 'mouseover', function(event) {
    var element = Event.element(event);
    element.setStyle({ display: 'none' });
var id = element.readAttribute('id').gsub('iprice_','');
reset_iactions();
field_display(id,'iprice','off');
field_display(id,'iaction','on');
});

$$(".iaction").invoke('observe', 'mouseout', function(event) {
    var element = Event.element(event);
    var id = element.readAttribute('id').gsub('iaction_','');
    if (element.visible()) {
    field_display(id,'iaction','off');
    field_display(id,'iprice','on');
    }
});

$$(".iaction").invoke('observe', 'click', function(event) {
    var element = Event.element(event);
    var id = element.readAttribute('id').gsub('iaction_','');
    field_display(id,'iaction','off');
    field_display(id,'iprice','off');
    var form = field_display(id,'iform','on');
    form.down('input').focus();
    });

//$('page').observe('click', function(event) { //clickout hiding - need to finish
    //var element = Event.element(event)
    //hide_class("form.iform"); //hide if element class does not contain iaction, iform, iprice
    //show_class(".iprice");
    //alert(element);
//});

$$(".iform").invoke('observe', 'focus', function(event) {
    Event.observe(document, 'keydown', function(event) {
        var element = Event.element(event);
        var id = element.up().readAttribute('id')
        if (event.keyCode == Event.KEY_ESC && id) {
            id = id.gsub('iform_','');
            field_display(id,'iaction','off');
            field_display(id,'iform','off');
            field_display(id,'iprice','on');
        }
});
});

$$(".iform").invoke('observe', 'submit', function(event) {
    var element = Event.element(event);
    var id = element.readAttribute('id').gsub('iform_','');
    var action = 'danazon';
    var locale = 'US';
    submit_iform(id,event,action,locale);
    });



try {
    $("productsdrop").style.width = String($("productsdrop").parentNode.style.width - 2) + "px";
    $("h1al").title = "Visit our homepage";
    $("h1a").title = "Visit our homepage";
    } catch (e) { }

check_blur($("sq"));
load_on_load();
load_delayed_images();


}


window.google_analytics_domain_name  = "camelcamelcamel.com"
window.google_analytics_uacct = "UA-10042935-2";

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-10042935-2']);
_gaq.push(['_setDomainName', '.camelcamelcamel.com']);
_gaq.push(['_setAllowHash', 'false']);

_gaq.push(['_setCustomVar', 1, "Section", "products"]);
_gaq.push(['_setCustomVar', 2, "Page", "search"]);
_gaq.push(['_setCustomVar', 3, "Locale", "US"]);
_gaq.push(['_setCustomVar', 4, "Farmer", "No"]);

_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
