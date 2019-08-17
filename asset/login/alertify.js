/*! AlertifyJS - v0.10.2 - Mohammad Younes <Mohammad@alertifyjs.com> (http://alertifyjs.com) */
!function(a){"use strict";function b(a,b){a.className+=" "+b}function c(a,b){for(var c=b.split(" "),d=0;d<c.length;d+=1)a.className=a.className.replace(" "+c[d],"")}function d(){return"rtl"===a.getComputedStyle(document.body).direction}function e(){return document.documentElement&&document.documentElement.scrollTop||document.body.scrollTop}function f(){return document.documentElement&&document.documentElement.scrollLeft||document.body.scrollLeft}function g(a,b){return function(){if(arguments.length>0){for(var c=[],d=0;d<arguments.length;d+=1)c.push(arguments[d]);return c.push(a),b.apply(a,c)}return b.apply(a,[null,a])}}function h(a,b){return{index:a,button:b,cancel:!1}}function i(){function a(a,b){for(var c in b)b.hasOwnProperty(c)&&(a[c]=b[c]);return a}function b(a){var b=d[a].dialog;return b&&"function"==typeof b.__init&&b.__init(b),b}function c(b,c,e,f){var g={dialog:null,factory:c};return void 0!==f&&(g.factory=function(){return a(new d[f].factory,new c)}),e||(g.dialog=a(new g.factory,p)),d[b]=g}var d={};return{defaults:k,dialog:function(d,e,f,g){if("function"!=typeof e)return b(d);if(this.hasOwnProperty(d))throw new Error("alertify.dialog: name already exists");var h=c(d,e,f,g);this[d]=f?function(){if(0===arguments.length)return h.dialog;var b=a(new h.factory,p);return b&&"function"==typeof b.__init&&b.__init(b),b.main.apply(b,arguments),b.show.apply(b)}:function(){if(h.dialog&&"function"==typeof h.dialog.__init&&h.dialog.__init(h.dialog),0===arguments.length)return h.dialog;var a=h.dialog;return a.main.apply(h.dialog,arguments),a.show.apply(h.dialog)}},closeAll:function(a){for(var b=l.slice(0),c=0;c<b.length;c+=1){var d=b[c];(void 0===a||a!==d)&&d.close()}},setting:function(a,c,d){if("notifier"===a)return q.setting(c,d);var e=b(a);return e?e.setting(c,d):void 0},set:function(a,b,c){return this.setting(a,b,c)},get:function(a,b){return this.setting(a,b)},notify:function(a,b,c,d){return q.create(b,d).push(a,c)},message:function(a,b,c){return q.create(null,c).push(a,b)},success:function(a,b,c){return q.create("success",c).push(a,b)},error:function(a,b,c){return q.create("error",c).push(a,b)},warning:function(a,b,c){return q.create("warning",c).push(a,b)},dismissAll:function(){q.dismissAll()}}}var j={ENTER:13,ESC:27,F1:112,F12:123,LEFT:37,RIGHT:39},k={modal:!0,basic:!1,frameless:!1,movable:!0,resizable:!0,closable:!0,maximizable:!0,startMaximized:!1,pinnable:!0,pinned:!0,padding:!0,overflow:!0,maintainFocus:!0,transition:"pulse",notifier:{delay:5,position:"bottom-right"},glossary:{title:"AlertifyJS",ok:"OK",cancel:"Cancel",acccpt:"Accept",deny:"Deny",confirm:"Confirm",decline:"Decline",close:"Close",maximize:"Maximize",restore:"Restore"},theme:{input:"ajs-input",ok:"ajs-ok",cancel:"ajs-cancel"}},l=[],m=function(){return document.addEventListener?function(a,b,c,d){a.addEventListener(b,c,d===!0)}:document.attachEvent?function(a,b,c){a.attachEvent("on"+b,c)}:void 0}(),n=function(){return document.removeEventListener?function(a,b,c,d){a.removeEventListener(b,c,d===!0)}:document.detachEvent?function(a,b,c){a.detachEvent("on"+b,c)}:void 0}(),o=function(){var a,b,c=!1,d={animation:"animationend",OAnimation:"oAnimationEnd oanimationend",msAnimation:"MSAnimationEnd",MozAnimation:"animationend",WebkitAnimation:"webkitAnimationEnd"};for(a in d)if(void 0!==document.documentElement.style[a]){b=d[a],c=!0;break}return{type:b,supported:c}}(),p=function(){function i(a){if(!a.__internal){delete a.__init,null===pb&&document.body.setAttribute("tabindex","0");var c;"function"==typeof a.setup?(c=a.setup(),c.options=c.options||{},c.focus=c.focus||{}):c={buttons:[],focus:{element:null,select:!1},options:{}};var d=a.__internal={isOpen:!1,activeElement:document.body,timerIn:void 0,timerOut:void 0,buttons:c.buttons||[],focus:c.focus,options:{title:void 0,modal:void 0,basic:void 0,frameless:void 0,pinned:void 0,movable:void 0,resizable:void 0,closable:void 0,maximizable:void 0,startMaximized:void 0,pinnable:void 0,transition:void 0,padding:void 0,overflow:void 0,onshow:void 0,onclose:void 0,onfocus:void 0},resetHandler:void 0,beginMoveHandler:void 0,beginResizeHandler:void 0,bringToFrontHandler:void 0,modalClickHandler:void 0,buttonsClickHandler:void 0,commandsClickHandler:void 0,transitionInHandler:void 0,transitionOutHandler:void 0},e={};e.root=document.createElement("div"),e.root.className=sb.base+" "+sb.hidden+" ",e.root.innerHTML=rb.dimmer+rb.modal,e.dimmer=e.root.firstChild,e.modal=e.root.lastChild,e.modal.innerHTML=rb.dialog,e.dialog=e.modal.firstChild,e.dialog.innerHTML=rb.reset+rb.commands+rb.header+rb.body+rb.footer+rb.resizeHandle+rb.reset,e.reset=[],e.reset.push(e.dialog.firstChild),e.reset.push(e.dialog.lastChild),e.commands={},e.commands.container=e.reset[0].nextSibling,e.commands.pin=e.commands.container.firstChild,e.commands.maximize=e.commands.pin.nextSibling,e.commands.close=e.commands.maximize.nextSibling,e.header=e.commands.container.nextSibling,e.body=e.header.nextSibling,e.body.innerHTML=rb.content,e.content=e.body.firstChild,e.footer=e.body.nextSibling,e.footer.innerHTML=rb.buttons.auxiliary+rb.buttons.primary,e.resizeHandle=e.footer.nextSibling,e.buttons={},e.buttons.auxiliary=e.footer.firstChild,e.buttons.primary=e.buttons.auxiliary.nextSibling,e.buttons.primary.innerHTML=rb.button,e.buttonTemplate=e.buttons.primary.firstChild,e.buttons.primary.removeChild(e.buttonTemplate);for(var f=0;f<a.__internal.buttons.length;f+=1){var h=a.__internal.buttons[f];ob.indexOf(h.key)<0&&ob.push(h.key),h.element=e.buttonTemplate.cloneNode(),h.element.innerHTML=h.text,"string"==typeof h.className&&""!==h.className&&b(h.element,h.className);for(var i in h.attrs)"className"!==i&&h.attrs.hasOwnProperty(i)&&h.element.setAttribute(i,h.attrs[i]);"auxiliary"===h.scope?e.buttons.auxiliary.appendChild(h.element):e.buttons.primary.appendChild(h.element)}a.elements=e,d.resetHandler=g(a,Q),d.beginMoveHandler=g(a,U),d.beginResizeHandler=g(a,$),d.bringToFrontHandler=g(a,u),d.modalClickHandler=g(a,K),d.buttonsClickHandler=g(a,M),d.commandsClickHandler=g(a,y),d.transitionInHandler=g(a,R),d.transitionOutHandler=g(a,S),a.set("title",void 0===c.options.title?r.defaults.glossary.title:c.options.title),a.set("modal",void 0===c.options.modal?r.defaults.modal:c.options.modal),a.set("basic",void 0===c.options.basic?r.defaults.basic:c.options.basic),a.set("frameless",void 0===c.options.frameless?r.defaults.frameless:c.options.frameless),a.set("movable",void 0===c.options.movable?r.defaults.movable:c.options.movable),a.set("resizable",void 0===c.options.resizable?r.defaults.resizable:c.options.resizable),a.set("closable",void 0===c.options.closable?r.defaults.closable:c.options.closable),a.set("maximizable",void 0===c.options.maximizable?r.defaults.maximizable:c.options.maximizable),a.set("startMaximized",void 0===c.options.startMaximized?r.defaults.startMaximized:c.options.startMaximized),a.set("pinnable",void 0===c.options.pinnable?r.defaults.pinnable:c.options.pinnable),a.set("pinned",void 0===c.options.pinned?r.defaults.pinned:c.options.pinned),a.set("transition",void 0===c.options.transition?r.defaults.transition:c.options.transition),a.set("padding",void 0===c.options.padding?r.defaults.padding:c.options.padding),a.set("overflow",void 0===c.options.overflow?r.defaults.overflow:c.options.overflow),"function"==typeof a.build&&a.build()}document.body.appendChild(a.elements.root)}function k(){for(var a=0,d=0;d<l.length;d+=1){var e=l[d];(e.isModal()||e.isMaximized())&&(a+=1)}0===a?c(document.body,sb.noOverflow):a>0&&document.body.className.indexOf(sb.noOverflow)<0&&b(document.body,sb.noOverflow)}function p(a,d,e){"string"==typeof e&&c(a.elements.root,sb.prefix+e),b(a.elements.root,sb.prefix+d),pb=a.elements.root.offsetWidth}function q(a){a.get("modal")?(c(a.elements.root,sb.modeless),a.isOpen()&&(hb(a),G(a),k())):(b(a.elements.root,sb.modeless),a.isOpen()&&(gb(a),G(a),k()))}function s(a){a.get("basic")?b(a.elements.root,sb.basic):c(a.elements.root,sb.basic)}function t(a){a.get("frameless")?b(a.elements.root,sb.frameless):c(a.elements.root,sb.frameless)}function u(a,b){for(var c=l.indexOf(b),d=c+1;d<l.length;d+=1)if(l[d].isModal())return;return document.body.lastChild!==b.elements.root&&(document.body.appendChild(b.elements.root),l.splice(l.indexOf(b),1),l.push(b),P(b)),!1}function v(a,d,e,f){switch(d){case"title":a.setHeader(f);break;case"modal":q(a);break;case"basic":s(a);break;case"frameless":t(a);break;case"pinned":H(a);break;case"closable":J(a);break;case"maximizable":I(a);break;case"pinnable":D(a);break;case"movable":Y(a);break;case"resizable":cb(a);break;case"transition":p(a,f,e);break;case"padding":f?c(a.elements.root,sb.noPadding):a.elements.root.className.indexOf(sb.noPadding)<0&&b(a.elements.root,sb.noPadding);break;case"overflow":f?c(a.elements.root,sb.noOverflow):a.elements.root.className.indexOf(sb.noOverflow)<0&&b(a.elements.root,sb.noOverflow);break;case"transition":p(a,f,e)}}function w(a,b,c,d,e){var f={op:void 0,items:[]};if("undefined"==typeof e&&"string"==typeof d)f.op="get",b.hasOwnProperty(d)?(f.found=!0,f.value=b[d]):(f.found=!1,f.value=void 0);else{var g;if(f.op="set","object"==typeof d){var h=d;for(var i in h)b.hasOwnProperty(i)?(b[i]!==h[i]&&(g=b[i],b[i]=h[i],c.call(a,i,g,h[i])),f.items.push({key:i,value:h[i],found:!0})):f.items.push({key:i,value:h[i],found:!1})}else{if("string"!=typeof d)throw new Error("args must be a string or object");b.hasOwnProperty(d)?(b[d]!==e&&(g=b[d],b[d]=e,c.call(a,d,g,e)),f.items.push({key:d,value:e,found:!0})):f.items.push({key:d,value:e,found:!1})}}return f}function x(a){var b;L(a,function(a){return b=a.invokeOnClose===!0}),!b&&a.isOpen()&&a.close()}function y(a,b){var c=a.srcElement||a.target;switch(c){case b.elements.commands.pin:b.isPinned()?A(b):z(b);break;case b.elements.commands.maximize:b.isMaximized()?C(b):B(b);break;case b.elements.commands.close:x(b)}return!1}function z(a){a.set("pinned",!0)}function A(a){a.set("pinned",!1)}function B(a){b(a.elements.root,sb.maximized),a.isOpen()&&k()}function C(a){c(a.elements.root,sb.maximized),a.isOpen()&&k()}function D(a){a.get("pinnable")?b(a.elements.root,sb.pinnable):c(a.elements.root,sb.pinnable)}function E(a){var b=f();a.elements.modal.style.marginTop=e()+"px",a.elements.modal.style.marginLeft=b+"px",a.elements.modal.style.marginRight=-b+"px"}function F(a){var b=parseInt(a.elements.modal.style.marginTop,10),c=parseInt(a.elements.modal.style.marginLeft,10);if(a.elements.modal.style.marginTop="",a.elements.modal.style.marginLeft="",a.elements.modal.style.marginRight="",a.isOpen()){var d=0,g=0;""!==a.elements.dialog.style.top&&(d=parseInt(a.elements.dialog.style.top,10)),a.elements.dialog.style.top=d+(b-e())+"px",""!==a.elements.dialog.style.left&&(g=parseInt(a.elements.dialog.style.left,10)),a.elements.dialog.style.left=g+(c-f())+"px"}}function G(a){a.get("modal")||a.get("pinned")?F(a):E(a)}function H(a){a.get("pinned")?(c(a.elements.root,sb.unpinned),a.isOpen()&&F(a)):(b(a.elements.root,sb.unpinned),a.isOpen()&&!a.isModal()&&E(a))}function I(a){a.get("maximizable")?b(a.elements.root,sb.maximizable):c(a.elements.root,sb.maximizable)}function J(a){a.get("closable")?(b(a.elements.root,sb.closable),mb(a)):(c(a.elements.root,sb.closable),nb(a))}function K(a,b){var c=a.srcElement||a.target;return tb||c!==b.elements.modal||x(b),tb=!1,!1}function L(a,b){for(var c=0;c<a.__internal.buttons.length;c+=1){var d=a.__internal.buttons[c];if(!d.element.disabled&&b(d)){var e=h(c,d);"function"==typeof a.callback&&a.callback.apply(a,[e]),e.cancel===!1&&a.close();break}}}function M(a,b){var c=a.srcElement||a.target;L(b,function(a){return a.element===c&&(ub=!0)})}function N(a){if(ub)return void(ub=!1);var b=l[l.length-1],c=a.keyCode;return 0===b.__internal.buttons.length&&c===j.ESC&&b.get("closable")===!0?(x(b),!1):ob.indexOf(c)>-1?(L(b,function(a){return a.key===c}),!1):void 0}function O(a){var b=l[l.length-1],c=a.keyCode;if(c===j.LEFT||c===j.RIGHT){for(var d=b.__internal.buttons,e=0;e<d.length;e+=1)if(document.activeElement===d[e].element)switch(c){case j.LEFT:return void d[(e||d.length)-1].element.focus();case j.RIGHT:return void d[(e+1)%d.length].element.focus()}}else if(c<j.F12+1&&c>j.F1-1&&ob.indexOf(c)>-1)return a.preventDefault(),a.stopPropagation(),L(b,function(a){return a.key===c}),!1}function P(a,b){if(b)b.focus();else{var c=a.__internal.focus,d=c.element;switch(typeof c.element){case"number":a.__internal.buttons.length>c.element&&(d=a.get("basic")===!0?a.elements.reset[0]:a.__internal.buttons[c.element].element);break;case"string":d=a.elements.body.querySelector(c.element);break;case"function":d=c.element.call(a)}"undefined"!=typeof d&&null!==d||0!==a.__internal.buttons.length||(d=a.elements.reset[0]),d&&d.focus&&(d.focus(),c.select&&d.select&&d.select())}}function Q(a,b){if(!b)for(var c=l.length-1;c>-1;c-=1)if(l[c].isModal()){b=l[c];break}if(b&&b.isModal()){var d,e=a.srcElement||a.target,f=e===b.elements.reset[1]||0===b.__internal.buttons.length&&e===document.body;f&&(b.get("maximizable")?d=b.elements.commands.maximize:b.get("closable")&&(d=b.elements.commands.close)),void 0===d&&("number"==typeof b.__internal.focus.element?e===b.elements.reset[0]?d=b.elements.buttons.auxiliary.firstChild||b.elements.buttons.primary.firstChild:f&&(d=b.elements.reset[0]):e===b.elements.reset[0]&&(d=b.elements.buttons.primary.lastChild||b.elements.buttons.auxiliary.lastChild)),P(b,d)}}function R(a,b){clearTimeout(b.__internal.timerIn),P(b),ub=!1,"function"==typeof b.get("onfocus")&&b.get("onfocus")(),n(b.elements.dialog,o.type,b.__internal.transitionInHandler),c(b.elements.root,sb.animationIn)}function S(a,b){clearTimeout(b.__internal.timerOut),n(b.elements.dialog,o.type,b.__internal.transitionOutHandler),X(b),bb(b),b.isMaximized()&&!b.get("startMaximized")&&C(b),r.defaults.maintainFocus&&b.__internal.activeElement&&(b.__internal.activeElement.focus(),b.__internal.activeElement=null)}function T(a,b){b.style.left=a[yb]-wb+"px",b.style.top=a[zb]-xb+"px"}function U(a,c){if(null===Ab&&!c.isMaximized()&&c.get("movable")){var d;if("touchstart"===a.type?(a.preventDefault(),d=a.targetTouches[0],yb="clientX",zb="clientY"):0===a.button&&(d=a),d){vb=c,wb=d[yb],xb=d[zb];var e=c.elements.dialog;return e.style.left&&(wb-=parseInt(e.style.left,10)),e.style.top&&(xb-=parseInt(e.style.top,10)),T(d,e),b(document.body,sb.noSelection),!1}}}function V(a){if(vb){var b;"touchmove"===a.type?(a.preventDefault(),b=a.targetTouches[0]):0===a.button&&(b=a),b&&T(b,vb.elements.dialog)}}function W(){vb&&(vb=null,c(document.body,sb.noSelection))}function X(a){vb=null;var b=a.elements.dialog;b.style.left=b.style.top=""}function Y(a){a.get("movable")?(b(a.elements.root,sb.movable),a.isOpen()&&ib(a)):(X(a),c(a.elements.root,sb.movable),a.isOpen()&&jb(a))}function Z(a,b,c){var e=b,f=0,g=0;do f+=e.offsetLeft,g+=e.offsetTop;while(e=e.offsetParent);var h,i;c===!0?(h=a.pageX,i=a.pageY):(h=a.clientX,i=a.clientY);var j=d();if(j&&(h=document.body.offsetWidth-h,isNaN(Bb)||(f=document.body.offsetWidth-f-b.offsetWidth)),b.style.height=i-g+Eb+"px",b.style.width=h-f+Eb+"px",!isNaN(Bb)){var k=.5*Math.abs(b.offsetWidth-Cb);j&&(k*=-1),b.offsetWidth>Cb?b.style.left=Bb+k+"px":b.offsetWidth>=Db&&(b.style.left=Bb-k+"px")}}function $(a,c){if(!c.isMaximized()){var d;if("touchstart"===a.type?(a.preventDefault(),d=a.targetTouches[0]):0===a.button&&(d=a),d){Ab=c,Eb=c.elements.resizeHandle.offsetHeight/2;var e=c.elements.dialog;return Bb=parseInt(e.style.left,10),e.style.height=e.offsetHeight+"px",e.style.minHeight=c.elements.header.offsetHeight+c.elements.footer.offsetHeight+"px",e.style.width=(Cb=e.offsetWidth)+"px","none"!==e.style.maxWidth&&(e.style.minWidth=(Db=e.offsetWidth)+"px"),e.style.maxWidth="none",b(document.body,sb.noSelection),!1}}}function _(a){if(Ab){var b;"touchmove"===a.type?(a.preventDefault(),b=a.targetTouches[0]):0===a.button&&(b=a),b&&Z(b,Ab.elements.dialog,!Ab.get("modal")&&!Ab.get("pinned"))}}function ab(){Ab&&(Ab=null,c(document.body,sb.noSelection),tb=!0)}function bb(a){Ab=null;var b=a.elements.dialog;"none"===b.style.maxWidth&&(b.style.maxWidth=b.style.minWidth=b.style.width=b.style.height=b.style.minHeight=b.style.left="",Bb=Number.Nan,Cb=Db=Eb=0)}function cb(a){a.get("resizable")?(b(a.elements.root,sb.resizable),a.isOpen()&&kb(a)):(bb(a),c(a.elements.root,sb.resizable),a.isOpen()&&lb(a))}function db(){for(var a=0;a<l.length;a+=1){var b=l[a];X(b),bb(b)}}function eb(b){1===l.length&&(m(a,"resize",db),m(document.body,"keyup",N),m(document.body,"keydown",O),m(document.body,"focus",Q),m(document.documentElement,"mousemove",V),m(document.documentElement,"touchmove",V),m(document.documentElement,"mouseup",W),m(document.documentElement,"touchend",W),m(document.documentElement,"mousemove",_),m(document.documentElement,"touchmove",_),m(document.documentElement,"mouseup",ab),m(document.documentElement,"touchend",ab)),m(b.elements.commands.container,"click",b.__internal.commandsClickHandler),m(b.elements.footer,"click",b.__internal.buttonsClickHandler),m(b.elements.reset[0],"focus",b.__internal.resetHandler),m(b.elements.reset[1],"focus",b.__internal.resetHandler),ub=!0,m(b.elements.dialog,o.type,b.__internal.transitionInHandler),b.get("modal")||gb(b),b.get("resizable")&&kb(b),b.get("movable")&&ib(b)}function fb(b){1===l.length&&(n(a,"resize",db),n(document.body,"keyup",N),n(document.body,"keydown",O),n(document.body,"focus",Q),n(document.documentElement,"mousemove",V),n(document.documentElement,"mouseup",W),n(document.documentElement,"mousemove",_),n(document.documentElement,"mouseup",ab)),n(b.elements.commands.container,"click",b.__internal.commandsClickHandler),n(b.elements.footer,"click",b.__internal.buttonsClickHandler),n(b.elements.reset[0],"focus",b.__internal.resetHandler),n(b.elements.reset[1],"focus",b.__internal.resetHandler),m(b.elements.dialog,o.type,b.__internal.transitionOutHandler),b.get("modal")||hb(b),b.get("movable")&&jb(b),b.get("resizable")&&lb(b)}function gb(a){m(a.elements.dialog,"focus",a.__internal.bringToFrontHandler,!0)}function hb(a){n(a.elements.dialog,"focus",a.__internal.bringToFrontHandler,!0)}function ib(a){m(a.elements.header,"mousedown",a.__internal.beginMoveHandler),m(a.elements.header,"touchstart",a.__internal.beginMoveHandler)}function jb(a){n(a.elements.header,"mousedown",a.__internal.beginMoveHandler),n(a.elements.header,"touchstart",a.__internal.beginMoveHandler)}function kb(a){m(a.elements.resizeHandle,"mousedown",a.__internal.beginResizeHandler),m(a.elements.resizeHandle,"touchstart",a.__internal.beginResizeHandler)}function lb(a){n(a.elements.resizeHandle,"mousedown",a.__internal.beginResizeHandler),n(a.elements.resizeHandle,"touchstart",a.__internal.beginResizeHandler)}function mb(a){m(a.elements.modal,"click",a.__internal.modalClickHandler)}function nb(a){n(a.elements.modal,"click",a.__internal.modalClickHandler)}var ob=[],pb=null,qb=a.navigator.userAgent.indexOf("Safari")>-1&&a.navigator.userAgent.indexOf("Chrome")<0,rb={dimmer:'<div class="ajs-dimmer"></div>',modal:'<div class="ajs-modal" tabindex="0"></div>',dialog:'<div class="ajs-dialog" tabindex="0"></div>',reset:'<button class="ajs-reset"></button>',commands:'<div class="ajs-commands"><button class="ajs-pin"></button><button class="ajs-maximize"></button><button class="ajs-close"></button></div>',header:'<div class="ajs-header"></div>',body:'<div class="ajs-body"></div>',content:'<div class="ajs-content"></div>',footer:'<div class="ajs-footer"></div>',buttons:{primary:'<div class="ajs-primary ajs-buttons"></div>',auxiliary:'<div class="ajs-auxiliary ajs-buttons"></div>'},button:'<button class="ajs-button"></button>',resizeHandle:'<div class="ajs-handle"></div>'},sb={base:"alertify",prefix:"ajs-",hidden:"ajs-hidden",noSelection:"ajs-no-selection",noOverflow:"ajs-no-overflow",noPadding:"ajs-no-padding",modeless:"ajs-modeless",movable:"ajs-movable",resizable:"ajs-resizable",fixed:"ajs-fixed",closable:"ajs-closable",maximizable:"ajs-maximizable",maximize:"ajs-maximize",restore:"ajs-restore",pinnable:"ajs-pinnable",unpinned:"ajs-unpinned",pin:"ajs-pin",maximized:"ajs-maximized",animationIn:"ajs-in",animationOut:"ajs-out",shake:"ajs-shake",basic:"ajs-basic",frameless:"ajs-frameless"},tb=!1,ub=!1,vb=null,wb=0,xb=0,yb="pageX",zb="pageY",Ab=null,Bb=Number.Nan,Cb=0,Db=0,Eb=0;return{__init:i,isOpen:function(){return this.__internal.isOpen},isModal:function(){return this.elements.root.className.indexOf(sb.modeless)<0},isMaximized:function(){return this.elements.root.className.indexOf(sb.maximized)>-1},isPinned:function(){return this.elements.root.className.indexOf(sb.unpinned)<0},maximize:function(){return this.isMaximized()||B(this),this},restore:function(){return this.isMaximized()&&C(this),this},pin:function(){return this.isPinned()||z(this),this},unpin:function(){return this.isPinned()&&A(this),this},moveTo:function(a,b){if(!isNaN(a)&&!isNaN(b)){var c=this.elements.dialog,e=c,f=0,g=0;c.style.left&&(f-=parseInt(c.style.left,10)),c.style.top&&(g-=parseInt(c.style.top,10));do f+=e.offsetLeft,g+=e.offsetTop;while(e=e.offsetParent);var h=a-f,i=b-g;d()&&(h*=-1),c.style.left=h+"px",c.style.top=i+"px"}return this},resizeTo:function(a,b){if(!isNaN(a)&&!isNaN(b)&&this.get("resizable")===!0){var c=this.elements.dialog;"none"!==c.style.maxWidth&&(c.style.minWidth=(Db=c.offsetWidth)+"px"),c.style.maxWidth="none",c.style.minHeight=this.elements.header.offsetHeight+this.elements.footer.offsetHeight+"px",c.style.width=a+"px",c.style.height=b+"px"}return this},setting:function(a,b){var c=this,d=w(this,this.__internal.options,function(a,b,d){v(c,a,b,d)},a,b);if("get"===d.op)return d.found?d.value:"undefined"!=typeof this.settings?w(this,this.settings,this.settingUpdated||function(){},a,b).value:void 0;if("set"===d.op){if(d.items.length>0)for(var e=this.settingUpdated||function(){},f=0;f<d.items.length;f+=1){var g=d.items[f];g.found||"undefined"==typeof this.settings||w(this,this.settings,e,g.key,g.value)}return this}},set:function(a,b){return this.setting(a,b),this},get:function(a){return this.setting(a)},setHeader:function(b){return"string"==typeof b?this.elements.header.innerHTML=b:b instanceof a.HTMLElement&&this.elements.header.firstChild!==b&&(this.elements.header.innerHTML="",this.elements.header.appendChild(b)),this},setContent:function(b){return"string"==typeof b?this.elements.content.innerHTML=b:b instanceof a.HTMLElement&&this.elements.content.firstChild!==b&&(this.elements.content.innerHTML="",this.elements.content.appendChild(b)),this},showModal:function(a){return this.show(!0,a)},show:function(a,d){if(i(this),this.__internal.isOpen){X(this),bb(this),b(this.elements.dialog,sb.shake);var e=this;setTimeout(function(){c(e.elements.dialog,sb.shake)},200)}else{if(this.__internal.isOpen=!0,l.push(this),r.defaults.maintainFocus&&(this.__internal.activeElement=document.activeElement),"function"==typeof this.prepare&&this.prepare(),eb(this),void 0!==a&&this.set("modal",a),k(),"string"==typeof d&&""!==d&&(this.__internal.className=d,b(this.elements.root,d)),this.get("startMaximized")?this.maximize():this.isMaximized()&&C(this),G(this),c(this.elements.root,sb.animationOut),b(this.elements.root,sb.animationIn),clearTimeout(this.__internal.timerIn),this.__internal.timerIn=setTimeout(this.__internal.transitionInHandler,o.supported?1e3:100),qb){var f=this.elements.root;f.style.display="none",setTimeout(function(){f.style.display="block"},0)}pb=this.elements.root.offsetWidth,c(this.elements.root,sb.hidden),"function"==typeof this.get("onshow")&&this.get("onshow")()}return this},close:function(){return this.__internal.isOpen&&(fb(this),c(this.elements.root,sb.animationIn),b(this.elements.root,sb.animationOut),clearTimeout(this.__internal.timerOut),this.__internal.timerOut=setTimeout(this.__internal.transitionOutHandler,o.supported?1e3:100),b(this.elements.root,sb.hidden),pb=this.elements.modal.offsetWidth,"undefined"!=typeof this.__internal.className&&""!==this.__internal.className&&c(this.elements.root,this.__internal.className),"function"==typeof this.get("onclose")&&this.get("onclose")(),l.splice(l.indexOf(this),1),this.__internal.isOpen=!1,k()),this},closeOthers:function(){return r.closeAll(this),this}}}(),q=function(){function a(a){a.__internal||(a.__internal={position:r.defaults.notifier.position,delay:r.defaults.notifier.delay},j=document.createElement("DIV"),f(a),document.body.appendChild(j))}function d(a){a.__internal.pushed=!0,k.push(a)}function e(a){k.splice(k.indexOf(a),1),a.__internal.pushed=!1}function f(a){switch(j.className=l.base,a.__internal.position){case"top-right":b(j,l.top+" "+l.right);break;case"top-left":b(j,l.top+" "+l.left);break;case"bottom-left":b(j,l.bottom+" "+l.left);break;default:case"bottom-right":b(j,l.bottom+" "+l.right)}}function h(a,f){function h(a,b){b.dismiss(!0)}function k(a,b){n(b.element,o.type,k),j.removeChild(b.element)}function p(a){return a.__internal||(a.__internal={pushed:!1,delay:void 0,timer:void 0,clickHandler:void 0,transitionEndHandler:void 0,transitionTimeout:void 0},a.__internal.clickHandler=g(a,h),a.__internal.transitionEndHandler=g(a,k)),a}function r(a){clearTimeout(a.__internal.timer),clearTimeout(a.__internal.transitionTimeout)}return p({element:a,push:function(a,c){if(!this.__internal.pushed){d(this),r(this);var e,f;switch(arguments.length){case 0:f=this.__internal.delay;break;case 1:"number"==typeof a?f=a:(e=a,f=this.__internal.delay);break;case 2:e=a,f=c}return"undefined"!=typeof e&&this.setContent(e),q.__internal.position.indexOf("top")<0?j.appendChild(this.element):j.insertBefore(this.element,j.firstChild),i=this.element.offsetWidth,b(this.element,l.visible),m(this.element,"click",this.__internal.clickHandler),this.delay(f)}return this},ondismiss:function(){},callback:f,dismiss:function(a){return this.__internal.pushed&&(r(this),("function"!=typeof this.ondismiss||this.ondismiss.call(this)!==!1)&&(n(this.element,"click",this.__internal.clickHandler),"undefined"!=typeof this.element&&this.element.parentNode===j&&(this.__internal.transitionTimeout=setTimeout(this.__internal.transitionEndHandler,o.supported?1e3:100),c(this.element,l.visible),"function"==typeof this.callback&&this.callback.call(this,a)),e(this))),this},delay:function(a){if(r(this),this.__internal.delay="undefined"==typeof a||isNaN(+a)?q.__internal.delay:+a,this.__internal.delay>0){var b=this;this.__internal.timer=setTimeout(function(){b.dismiss()},1e3*this.__internal.delay)}return this},setContent:function(a){return"string"==typeof a?this.element.innerHTML=a:this.element.appendChild(a),this},dismissOthers:function(){return q.dismissAll(this),this}})}var i,j,k=[],l={base:"alertify-notifier",message:"ajs-message",top:"ajs-top",right:"ajs-right",bottom:"ajs-bottom",left:"ajs-left",visible:"ajs-visible",hidden:"ajs-hidden"};return{setting:function(b,c){if(a(this),"undefined"==typeof c)return this.__internal[b];switch(b){case"position":this.__internal.position=c,f(this);break;case"delay":this.__internal.delay=c}return this},set:function(a,b){return this.setting(a,b),this},get:function(a){return this.setting(a)},create:function(b,c){a(this);var d=document.createElement("div");return d.className=l.message+("string"==typeof b&&""!==b?" ajs-"+b:""),h(d,c)},dismissAll:function(a){for(var b=k.slice(0),c=0;c<b.length;c+=1){var d=b[c];(void 0===a||a!==d)&&d.dismiss()}}}}(),r=new i;r.dialog("alert",function(){return{main:function(a,b,c){var d,e,f;switch(arguments.length){case 1:e=a;break;case 2:"function"==typeof b?(e=a,f=b):(d=a,e=b);break;case 3:d=a,e=b,f=c}return this.set("title",d),this.set("message",e),this.set("onok",f),this},setup:function(){return{buttons:[{text:r.defaults.glossary.ok,key:j.ESC,invokeOnClose:!0,className:r.defaults.theme.ok}],focus:{element:0,select:!1},options:{maximizable:!1,resizable:!1}}},build:function(){},prepare:function(){},setMessage:function(a){this.setContent(a)},settings:{message:void 0,onok:void 0,label:void 0},settingUpdated:function(a,b,c){switch(a){case"message":this.setMessage(c);break;case"label":this.__internal.buttons[0].element&&(this.__internal.buttons[0].element.innerHTML=c)}},callback:function(a){if("function"==typeof this.get("onok")){var b=this.get("onok").call(void 0,a);"undefined"!=typeof b&&(a.cancel=!b)}}}}),r.dialog("confirm",function(){function a(a){null!==c.timer&&(clearInterval(c.timer),c.timer=null,a.__internal.buttons[c.index].element.innerHTML=c.text)}function b(b,d,e){a(b),c.duration=e,c.index=d,c.text=b.__internal.buttons[d].element.innerHTML,c.timer=setInterval(g(b,c.task),1e3),c.task(null,b)}var c={timer:null,index:null,text:null,duratuin:null,task:function(b,d){if(d.isOpen()){if(d.__internal.buttons[c.index].element.innerHTML=c.text+" (&#8207;"+c.duration+"&#8207;) ",c.duration-=1,-1===c.duration){a(d);var e=d.__internal.buttons[c.index],f=h(c.index,e);"function"==typeof d.callback&&d.callback.apply(d,[f]),f.close!==!1&&d.close()}}else a(d)}};return{main:function(a,b,c,d){var e,f,g,h;switch(arguments.length){case 1:f=a;break;case 2:f=a,g=b;break;case 3:f=a,g=b,h=c;break;case 4:e=a,f=b,g=c,h=d}return this.set("title",e),this.set("message",f),this.set("onok",g),this.set("oncancel",h),this},setup:function(){return{buttons:[{text:r.defaults.glossary.ok,key:j.ENTER,className:r.defaults.theme.ok},{text:r.defaults.glossary.cancel,key:j.ESC,invokeOnClose:!0,className:r.defaults.theme.cancel}],focus:{element:0,select:!1},options:{maximizable:!1,resizable:!1}}},build:function(){},prepare:function(){},setMessage:function(a){this.setContent(a)},settings:{message:null,labels:null,onok:null,oncancel:null,defaultFocus:null,reverseButtons:null},settingUpdated:function(a,b,c){switch(a){case"message":this.setMessage(c);break;case"labels":"ok"in c&&this.__internal.buttons[0].element&&(this.__internal.buttons[0].text=c.ok,this.__internal.buttons[0].element.innerHTML=c.ok),"cancel"in c&&this.__internal.buttons[1].element&&(this.__internal.buttons[1].text=c.cancel,this.__internal.buttons[1].element.innerHTML=c.cancel);break;case"reverseButtons":this.elements.buttons.primary.appendChild(c===!0?this.__internal.buttons[0].element:this.__internal.buttons[1].element);break;case"defaultFocus":this.__internal.focus.element="ok"===c?0:1}},callback:function(b){a(this);var c;switch(b.index){case 0:"function"==typeof this.get("onok")&&(c=this.get("onok").call(void 0,b),"undefined"!=typeof c&&(b.cancel=!c));break;case 1:"function"==typeof this.get("oncancel")&&(c=this.get("oncancel").call(void 0,b),"undefined"!=typeof c&&(b.cancel=!c))}},autoOk:function(a){return b(this,0,a),this},autoCancel:function(a){return b(this,1,a),this}}}),r.dialog("prompt",function(){var b=document.createElement("INPUT"),c=document.createElement("P");return{main:function(a,b,c,d,e){var f,g,h,i,j;switch(arguments.length){case 1:g=a;break;case 2:g=a,h=b;break;case 3:g=a,h=b,i=c;break;case 4:g=a,h=b,i=c,j=d;break;case 5:f=a,g=b,h=c,i=d,j=e}return this.set("title",f),this.set("message",g),this.set("value",h),this.set("onok",i),this.set("oncancel",j),this},setup:function(){return{buttons:[{text:r.defaults.glossary.ok,key:j.ENTER,className:r.defaults.theme.ok},{text:r.defaults.glossary.cancel,key:j.ESC,invokeOnClose:!0,className:r.defaults.theme.cancel}],focus:{element:b,select:!0},options:{maximizable:!1,resizable:!1}}},build:function(){b.className=r.defaults.theme.input,b.setAttribute("type","text"),b.value=this.get("value"),this.elements.content.appendChild(c),this.elements.content.appendChild(b)},prepare:function(){},setMessage:function(b){"string"==typeof b?c.innerHTML=b:b instanceof a.HTMLElement&&c.firstChild!==b&&(c.innerHTML="",c.appendChild(b))},settings:{message:void 0,labels:void 0,onok:void 0,oncancel:void 0,value:"",reverseButtons:void 0},settingUpdated:function(a,c,d){switch(a){case"message":this.setMessage(d);break;case"value":b.value=d;break;case"labels":d.ok&&this.__internal.buttons[0].element&&(this.__internal.buttons[0].element.innerHTML=d.ok),d.cancel&&this.__internal.buttons[1].element&&(this.__internal.buttons[1].element.innerHTML=d.cancel);break;case"reverseButtons":this.elements.buttons.primary.appendChild(d===!0?this.__internal.buttons[0].element:this.__internal.buttons[1].element)
}},callback:function(a){var c;switch(a.index){case 0:this.value=b.value,"function"==typeof this.get("onok")&&(c=this.get("onok").call(void 0,a,this.value),"undefined"!=typeof c&&(a.cancel=!c));break;case 1:"function"==typeof this.get("oncancel")&&(c=this.get("oncancel").call(void 0,a),"undefined"!=typeof c&&(a.cancel=!c))}}}}),"function"==typeof define?define([],function(){return r}):a.alertify||(a.alertify=r)}(this);