!function ($) {
    "use strict";

    var calculateObjectValue = $.fn.bootstrapTable.utils.calculateObjectValue,
        sprintf = $.fn.bootstrapTable.utils.sprintf;

    var copytext = function (text) {
        var textField = document.createElement('textarea');
        $(textField).html(text);
        document.body.appendChild(textField);
        textField.select();

        try {
            document.execCommand('copy');
        }
        catch (e) {
            console.log("Oops, unable to copy");
        }
        $(textField).remove();
    };

    var reInit = function (self) {
        self.initHeader();
        self.initSearch();
        self.initPagination();
        self.initBody();
    };

    $.extend($.fn.bootstrapTable.defaults, {
        showHideAllBtn: false,
        showHideAllDefaults: [], //column names go here
        copyBtn: false,
        copyWHiddenBtn: false,
        copyDelemeter: ", "
    });

    $.fn.bootstrapTable.methods.push('hideAllColumns', 'showAllColumns', 'copyColumnsToClipboard', 'copyColumnsToClipboardWithHidden');

    var BootstrapTable = $.fn.bootstrapTable.Constructor,
        _initToolbar = BootstrapTable.prototype.initToolbar;

    BootstrapTable.prototype.initToolbar = function () {

        _initToolbar.apply(this, Array.prototype.slice.apply(arguments));

        var that = this,
            $btnGroup = this.$toolbar.find('>.btn-group');

        if (typeof this.options.showHideAllDefaults === 'string') {
            this.options.showHideAllDefaults = JSON.parse(this.options.showHideAllDefaults);
        }

        if (this.options.showHideAllBtn && this.options.showColumns) {
            var showbtn = "<button class='btn btn-default hidden' id='showAllBtn'><span class='glyphicon glyphicon-resize-full icon-zoom-in'></span></button>",
                hidebtn = "<button class='btn btn-default' id='hideAllBtn'><span class='glyphicon glyphicon-resize-small icon-zoom-out'></span></button>";

            $btnGroup.append(showbtn + hidebtn);

            $btnGroup.find('#showAllBtn').click(function () { that.showAllColumns(); 
                $btnGroup.find('#hideAllBtn').toggleClass('hidden');
                $btnGroup.find('#showAllBtn').toggleClass('hidden');  
            });
            $btnGroup.find('#hideAllBtn').click(function () { that.hideAllColumns(); 
                $btnGroup.find('#hideAllBtn').toggleClass('hidden');
                $btnGroup.find('#showAllBtn').toggleClass('hidden');  
            });
        }

        if (this.options.clickToSelect || this.options.singleSelect) {

            if (this.options.copyBtn) {
                var copybtn = "<button class='btn btn-default' id='copyBtn'><span class='glyphicon glyphicon-copy icon-pencil'></span></button>";
                $btnGroup.append(copybtn);
                $btnGroup.find('#copyBtn').click(function () { that.copyColumnsToClipboard(); });
            }

            if (this.options.copyWHiddenBtn) {
                var copyhiddenbtn = "<button class='btn btn-default' id='copyWHiddenBtn'><span class='badge'><span class='glyphicon glyphicon-copy icon-pencil'></span></span></button>";
                $btnGroup.append(copyhiddenbtn);
                $btnGroup.find('#copyWHiddenBtn').click(function () { that.copyColumnsToClipboardWithHidden(); });
            }
        }
    };

    BootstrapTable.prototype.hideAllColumns = function () {
        var self = this,
            defaults = self.options.showHideAllDefaults;

        $.each(this.columns, function (index, column) {
            //if its one of the defaults dont touch it
            if (defaults.indexOf(column.field) == -1 && column.switchable) {
                column.visible = false;
                var $items = self.$toolbar.find('.keep-open input').prop('disabled', false);
                $items.filter(sprintf('[value="%s"]', index)).prop('checked', false);
            }
        });

        reInit(self);
    };

    BootstrapTable.prototype.showAllColumns = function () {
        var self = this;
        $.each(this.columns, function (index, column) {
            if (column.switchable) {
                column.visible = true;
            }

            var $items = self.$toolbar.find('.keep-open input').prop('disabled', false);
            $items.filter(sprintf('[value="%s"]', index)).prop('checked', true);
        });

        reInit(self);

        self.toggleColumn(0, self.columns[0].visible, false);
    };

    BootstrapTable.prototype.copyColumnsToClipboard = function () {
        var self = this,
            ret = "",
            delimet = this.options.copyDelemeter;

        $.each(self.getSelections(), function (index, row) {
            $.each(self.options.columns[0], function (indy, column) {
                if (column.field !== "state" && column.field !== "RowNumber" && column.visible) {
                    if (row[column.field] !== null) {
                        ret += calculateObjectValue(column, self.header.formatters[indy], [row[column.field], row, index], row[column.field]);
                    }
                    ret += delimet;
                }
            });

            ret += "\r\n";
        });

        copytext(ret);
    };

    BootstrapTable.prototype.copyColumnsToClipboardWithHidden = function () {
        var self = this,
            ret = "",
            delimet = this.options.copyDelemeter;

        $.each(self.getSelections(), function (index, row) {
            $.each(self.options.columns[0], function (indy, column) {
                if (column.field != "state" && column.field !== "RowNumber") {
                    if (row[column.field] !== null) {
                        ret += calculateObjectValue(column, self.header.formatters[indy], [row[column.field], row, index], row[column.field]);
                    }
                    ret += delimet;
                }
            });

            ret += "\r\n";
        });

        copytext(ret);
    };
}(jQuery);
