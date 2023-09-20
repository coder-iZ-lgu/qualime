MathJax.Hub.Config({
    config: ["MMLorHTML.js"],
    jax: ["input/TeX","input/MathML","input/AsciiMath","output/HTML-CSS","output/NativeMML", "output/PreviewHTML"],
    extensions: ["tex2jax.js","mml2jax.js","asciimath2jax.js","MathMenu.js","MathZoom.js", "fast-preview.js", "AssistiveMML.js"],
    TeX: {
        extensions: ["AMSmath.js","AMSsymbols.js","noErrors.js","noUndefined.js"]
    },
    "HTML-CSS": {
     styles: {
       ".MathJax_Display": {display: "inline-block"}
     }
    }
});