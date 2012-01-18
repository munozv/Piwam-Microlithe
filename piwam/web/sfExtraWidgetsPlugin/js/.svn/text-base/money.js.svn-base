var Money = Class.create(
{
    initialize: function(el)
    {
        this.element = $(el);
        this.options = Object.extend({
            symbol: '$'
        }, arguments[1] || { });
        
        this.element.setStyle({ textAlign: 'right' })
        this.addSymbol();
        
        Event.observe(this.element, 'keypress', this.onKeyPress.bindAsEventListener(this));
        Event.observe(this.element, 'focus', this.onFocus.bindAsEventListener(this));
        Event.observe(this.element, 'blur', this.onBlur.bindAsEventListener(this));
    },
    
    addSymbol: function()
    {
        var symbol_div = new Element('div', { 'class': 'money-symbol', id: this.element.id + '_symbol' }).update(this.options.symbol);
        
        $('container-' + this.element.id).insertBefore(symbol_div, $(this.element.id));
    },
    
    onKeyPress: function(e)
    {        
        if(typeof this.element.selectionStart != "undefined")
        {
            if(e.keyCode != 46)
            {
                if(e.charCode == 46)
                {             
                    if(this.element.value.indexOf('.') != -1)
                    {
                        this.preventDefault(e);
                        this.element.value = this.element.value.substring(0, this.element.value.length - 2);
                        this.moveCursor(this.element.value.length);    
                        return true;
                    }
                }
            }
        }
        else
        {
            if(window.event.keyCode == 46)
            {             
                if(this.element.value.indexOf('.') != -1)
                {
                    this.preventDefault(e);
                    this.element.value = this.element.value.substring(0, this.element.value.length - 2);
                    this.moveCursor(this.element.value.length);    
                    return true;
                }
            }
        }
    },
    
    onBlur: function()
    {
        if(isNaN(this.element.value))
        {
            this.element.value = '0.00';
        }
        else
        {
            this.element.value = Math.round(this.element.value * 20) / 20;
            
            if(this.element.value.indexOf('.') == -1)
            {
                this.element.value += '.';
            }
            
            if(this.element.value.length - this.element.value.indexOf('.') == 1)
            {
                this.element.value += '00';
            }
            
            if(this.element.value.length - this.element.value.indexOf('.') == 2)
            {
                this.element.value += '0';
            }
        }
    },
    
    onFocus: function()
    {
        if(this.element.value == '')
        {
            this.element.value = '0.00';
        }
        
        this.remove = true;
        this.moveCursor(0, this.element.value.length - 3);
    },
    
    moveCursor: function(start, end)
    {
        var Obj = this.element;
        
        if(typeof end == "undefined")
        {
            end = start;
        }
        
        if(typeof Obj.selectionStart != "undefined")
        {
            Obj.setSelectionRange(start, end);
        }
        else
        {
            var Chaine = Obj.createTextRange();
            Chaine.moveStart('character', start);
            Chaine.collapse();
            
            Chaine.moveEnd('character', end);
            Chaine.select();
        }
    },
    
    getCursorPos: function()
    {
        var Obj = this.element;
        if(Obj)
        {
            if(typeof Obj.selectionStart != "undefined")
            {
                return Obj.selectionStart;
            }
            else
            { // IE and consort
                var szMark = "~~";
                var Chaine = Obj.value;
                //-- Cree un double et insert la Mark ou est le curseur
                var szTmp = document.selection.createRange();
                szTmp.text = szMark;
                //-- Recup. la position du curseur
                var PosDeb = Obj.value.search(szMark);
                //-(*)- Supprime les retours Chariot
                var szAvant = Chaine.substring( 0 , PosDeb);
                PosDeb -= Get_NbrCR( szAvant);
                //-- Restaure valeur initiale
                Obj.value = Chaine;
                Chaine = Obj.createTextRange();
                //-- Deplace le Debut de la chaine
                Chaine.moveStart('character', PosDeb);
                //-- Deplace le curseur
                Chaine.collapse();
                Chaine.select();
                return( PosDeb);
            }
        } 
    },
    
    preventDefault: function(e) 
    {
        if (e.preventDefault) { //standart browsers
            e.preventDefault()
        } else { // internet explorer
            e.returnValue = false
        }
    }
});