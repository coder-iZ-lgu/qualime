var QLTY = QLTY || {};
QLTY.createNS("QLTY.core.utils");

QLTY.core.utils = {
  rgb2hex : function(rgb) {
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	function hex(x) {
	    return ("0" + parseInt(x).toString(16)).slice(-2);
	}
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }
}