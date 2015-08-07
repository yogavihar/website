/*!
 * Copyright 2006 - 2015 TubePress LLC (http://tubepress.com)
 *
 * This file is part of TubePress (http://tubepress.com)
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */
(function(j,a,c){var i="popup",e=j.Beacon.subscribe,p={},l="gallery",f="Id",s="tubepress."+l+".player.",q=l+f,n="item",h=n+f,k="height",b="width",m="embedded",g="mediaItem",o=function(t){return(t/2)},r=function(w,v){var C=j.Gallery,A=v[q],B=C.Options,y=B.getOption,z=y(A,m+"Height"),t=y(A,m+"Width"),x=o(a[k])-o(z),u=o(a[b])-o(t);p[A+v[h]]=c.open("","","location=0,directories=0,menubar=0,scrollbars=0,status=0,toolbar=0,width="+t+"px,height="+z+"px,top="+x+",left="+u)},d=function(x,w){var v=w[g],z=v.title,u='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><title>'+z+'</title></head><body style="margin: 0pt; background-color: black;">',y="</body></html>",t=p[w[q]+w[h]].document;t.write(u+w.html+y);t.close()};e(s+"invoke."+i,r);e(s+"populate."+i,d)}(TubePress,screen,window));