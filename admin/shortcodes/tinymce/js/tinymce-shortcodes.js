(function () {
    tinymce.PluginManager.add('inafx_shortcodes', function (editor, url) {
        editor.addButton('inafx_shortcodes', {
            title: 'Insert Shortcode',
            type: 'menubutton',
            icon: 'icon dashicons dashicons-admin-generic',
            menu: [
                {
                    text: 'Grid',
                    menu: [
                        {
                            text: '1 Column',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1 Column Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_one]...[/col_one][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '1/2 + 1/2 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1/2 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_onehalf]...[/col_onehalf][col_onehalf]...[/col_onehalf][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '1/3 + 1/3 + 1/3 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1/3 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_onethird]...[/col_onethird][col_onethird]...[/col_onethird][col_onethird]...[/col_onethird][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '1/3 + 2/3 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1/3 + 2/3 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_onethird]...[/col_onethird][col_twothird]...[/col_twothird][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '2/3 + 1/3 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 2/3 + 1/3 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_twothird]...[/col_twothird][col_onethird]...[/col_onethird][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '1/4 + 1/4 + 1/4 + 1/4 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1/4 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_oneforth]...[/col_oneforth][col_oneforth]...[/col_oneforth][col_oneforth]...[/col_oneforth][col_oneforth]...[/col_oneforth][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '1/4 + 3/4 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 1/4 + 3/4 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_oneforth]...[/col_oneforth][col_threeforth]...[/col_threeforth][/row]');
                                    }
                                });
                            }
                        },
                        {
                            text: '3/4 + 1/4 Columns',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert 3/4 + 1/4 Columns Grid Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_textalign',
                                            tooltip: 'Choose text align.',
                                            label: 'Text Align',
                                            'values': [
                                                { text: 'left', value: 'text-left' },
                                                { text: 'right', value: 'text-right' },
                                                { text: 'center', value: 'text-center' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[row' + ((e.data.lst_textalign != 'text-left') ? ' class="' + e.data.lst_textalign + '"' : '') + '][col_threeforth]...[/col_threeforth][col_oneforth]...[/col_oneforth][/row]');
                                    }
                                });
                            }
                        }
                    ]
                },

                {
                    text: 'Typography',
                    menu: [
                        {
                            text: 'Text Highlight',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Text Highlight Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_bgstyle',
                                            tooltip: 'Choose Text Background Style.',
                                            label: 'CSS Style',
                                            'values': [
                                                { text: 'White', value: 'white' },
                                                { text: 'Color', value: 'color' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[highlight class="' + e.data.lst_bgstyle + '"]...[/highlight]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Drop Cap',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert DropCap Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_bgstyle',
                                            tooltip: 'Choose DropCap Style.',
                                            label: 'CSS Style',
                                            'values': [
                                                { text: 'White', value: 'white' },
                                                { text: 'Color', value: 'color' },
                                                { text: 'Border', value: 'border' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[dropcap class="' + e.data.lst_bgstyle + '"]...[/dropcap]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Lists',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Lists Shortcode',
                                    width: 380,
                                    height: 120,
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_listtype',
                                            tooltip: 'Choose List Style/Icon.',
                                            label: 'List Icon type',
                                            'values': load_list_icons()
                                        },
                                        {
                                            type: 'listbox',
                                            name: 'lst_liststyle',
                                            tooltip: 'Choose List Style.',
                                            label: 'List Style',
                                            'values': [
                                                { text: 'black', value: 'black' },
                                                { text: 'white', value: 'white' },
                                                { text: 'color', value: 'color' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[list type="' + e.data.lst_listtype + '" style="' + e.data.lst_liststyle + '"]...[/list]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Blockquote',
                            value: '[blockquote author=""]...[/blockquote]',
                            onclick: function () { editor.insertContent(this.value()); }
                        },
                        {
                            text: 'Pullquote',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert PullQuote Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_style',
                                            tooltip: 'Choose Background Style.',
                                            label: 'Background Style',
                                            'values': [
                                                { text: 'white', value: 'white' },
                                                { text: 'grey', value: 'grey' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[pullquote style="' + e.data.lst_style + '" author=""]...[/pullquote]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Pushquote',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert PushQuote Shortcode',
                                    body: [
                                        {
                                            type: 'listbox',
                                            name: 'lst_style',
                                            tooltip: 'Choose Background Style.',
                                            label: 'Background Style',
                                            'values': [
                                                { text: 'white', value: 'white' },
                                                { text: 'grey', value: 'grey' }
                                            ]
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        editor.insertContent('[pushquote style="' + e.data.lst_style + '" author=""]...[/pushquote]');
                                    }
                                });
                            }
                        }
                    ]
                },

                {
                    text: 'Elements',
                    menu: [
                        {
                            text: 'Spacer',
                            value: '[spacer]',
                            onclick: function () { editor.insertContent(this.value()); }
                        },
                        {
                            text: 'Accordion',
                            value: '[accordions][accordion title="title1" active="yes"]accordion content[/accordion][accordion title="title2"]accordion content[/accordion][/accordions]',
                            onclick: function () { editor.insertContent(this.value()); }
                        },
                        {
                            text: 'Tabs',
                            value: '[tabs active="tab1" tab1="tab 1" tab2="tab 2" tab3="tab 3"][tab1]tab content[/tab1][tab2]tab content[/tab2][tab3]tab content[/tab3][/tabs]',
                            onclick: function () { editor.insertContent(this.value()); }
                        },
                        {
                            text: 'Info Box',
                            value: '[info_box title="title"]info box content[/info_box]',
                            onclick: function () { editor.insertContent(this.value()); }
                        },
                        {
                            text: 'Alert Box',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Alert box Shortcode',
                                    body: [{
                                        type: 'listbox',
                                        name: 'style',
                                        tooltip: 'Alert Box style.',
                                        label: 'Style',
                                        'values': [
                                            { text: 'success', value: 'alert-success' },
                                            { text: 'info', value: 'alert-info' },
                                            { text: 'warning', value: 'alert-warning' },
									        { text: 'danger', value: 'alert-danger' }
                                        ]
                                    }, {
                                        type: 'listbox',
                                        name: 'closealert',
                                        tooltip: 'Show close button or not - yes/no.',
                                        label: 'Close button',
                                        'values': [
                                            { text: 'yes', value: 'yes' },
                                            { text: 'no', value: 'no' }
                                        ]
                                    }],
                                    onsubmit: function (e) {
                                        editor.insertContent('[alert_box style="' + e.data.style + '" close="' + e.data.closealert + '"]Hello, World![/alert_box]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Progressbar',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Progressbar Shortcode',
                                    body: [{
                                        type: 'textbox',
                                        name: 'val',
                                        label: 'Value',
                                        tooltip: 'Enter the value for bar ( without % sign).'
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'label',
                                        label: 'Label',
                                        tooltip: 'Enter label.'
                                    },
                                    {
                                        type: 'listbox',
                                        name: 'style',
                                        label: 'Style',
                                        tooltip: 'Choose progressbar style.',
                                        values: [
                                            { text: 'default', value: '' },
                                            { text: 'striped', value: 'striped' },
                                            { text: 'animated', value: 'animated' }
                                        ]
                                    }],
                                    onsubmit: function (e) {
                                        editor.insertContent('[progressbar style="' + e.data.style + '" value="' + e.data.val + '" label="' + e.data.label + '"]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Button',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Button Shortcode',
                                    body: [{
                                        type: 'textbox',
                                        name: 'btxt',
                                        label: 'Button Text',
                                        tooltip: 'Enter the text for button.'

                                    },
                                    {
                                        type: 'listbox',
                                        name: 'iconame',
                                        label: 'Icon name',
                                        tooltip: 'Select the name of the icon.',
                                        'values': load_icons()
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'btlink',
                                        label: 'Button Link',
                                        tooltip: 'Enter the link for button. (e.g. http://example.com)'

                                    },
                                    {
                                        type: 'listbox',
                                        name: 'style',
                                        tooltip: 'Choose button style.',
                                        label: 'Style',
                                        'values': [
                                            { text: 'default', value: 'btn-default' },
                                            { text: 'theme', value: 'btn-theme' },
                                            { text: 'primary', value: 'btn-primary' },
                                            { text: 'info', value: 'btn-info' },
                                            { text: 'warning', value: 'btn-warning' },
                                            { text: 'danger', value: 'btn-danger' },
                                            { text: 'success', value: 'btn-success' },
									        { text: 'link', value: 'btn-link' }
                                        ]
                                    },
                                    {
                                        type: 'listbox',
                                        name: 'size',
                                        tooltip: 'Choose button size.',
                                        label: 'Size',
                                        'values': [
                                            { text: 'mini', value: 'btn-xs' },
                                            { text: 'small', value: 'btn-sm' },
                                            { text: 'normal', value: '' },
									        { text: 'large', value: 'btn-lg' }
                                        ]
                                    },
                                    {
                                        type: 'listbox',
                                        name: 'target',
                                        tooltip: 'The target attribute specifies a window or a frame where the linked document is loaded.',
                                        label: 'Target',
                                        'values': [
                                            { text: '_blank', value: '_blank' },
                                            { text: '_self', value: '_self' },
                                            { text: '_parent', value: '_parent' },
									        { text: '_top', value: '_top' }
                                        ]
                                    },
                                    {
                                        type: 'listbox',
                                        name: 'display',
                                        tooltip: 'Choose between inline and block display options.',
                                        label: 'Display',
                                        'values': [
                                            { text: 'inline', value: '' },
                                            { text: 'block', value: 'btn-block' }
                                        ]
                                    }],
                                    onsubmit: function (e) {
                                        editor.insertContent('[button text="' + e.data.btxt + '" link="' + e.data.btlink + '" style="' + e.data.style + '" size="' + e.data.size + '" target="' + e.data.target + '" display="' + e.data.display + '" icon="' + e.data.iconame + '"]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Icon',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Icon Shortcode',
                                    body: [{
                                        type: 'listbox',
                                        name: 'iconname',
                                        label: 'Icon name',
                                        tooltip: 'Select the name of the icon.',
                                        'values': load_icons()

                                    }, {
                                        type: 'listbox',
                                        name: 'align',
                                        tooltip: 'Choose icons align.',
                                        label: 'Align',
                                        'values': [
                                            { text: 'left', value: 'left' },
                                            { text: 'right', value: 'right' },
                                            { text: 'center', value: 'center' },
									        { text: 'none', value: 'none' }
                                        ]
                                    },
                                    {
                                        type: 'listbox',
                                        name: 'size',
                                        tooltip: 'Choose icons size.',
                                        label: 'Size',
                                        'values': [
                                            { text: '1x', value: 'fa-1x' },
                                            { text: '2x', value: 'fa-2x' },
                                            { text: '3x', value: 'fa-3x' },
									        { text: '4x', value: 'fa-4x' },
									        { text: '5x', value: 'fa-5x' }
                                        ]
                                    },
                                    {
                                        type: 'textbox',
                                        name: 'iconcolor',
                                        label: 'Icon color',
                                        tooltip: 'Enter icons color'

                                    }],
                                    onsubmit: function (e) {
                                        editor.insertContent('[icon icon="' + e.data.iconname + '" align="' + e.data.align + '" size="' + e.data.size + '" color="' + e.data.iconcolor + '"]');
                                    }
                                });
                            }
                        },
                        {
                            text: 'Label',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'Insert Label Shortcode',
                                    body: [{
                                        type: 'textbox',
                                        name: 'ltxt',
                                        label: 'Label Text',
                                        tooltip: 'Enter the text for label.'

                                    },
                                    {
                                        type: 'listbox',
                                        name: 'style',
                                        tooltip: 'Choose label style.',
                                        label: 'Style',
                                        'values': [
                                            { text: 'default', value: 'label-default' },
                                            { text: 'primary', value: 'label-primary' },
                                            { text: 'info', value: 'label-info' },
                                            { text: 'warning', value: 'label-warning' },
                                            { text: 'danger', value: 'label-danger' },
                                            { text: 'success', value: 'label-success' }
                                        ]
                                    }],
                                    onsubmit: function (e) {
                                        editor.insertContent('[label text="' + e.data.ltxt + '" style="' + e.data.style + '"]');
                                    }
                                });
                            }
                        }
                    ]
                },

                {
                    text: 'Google Map',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert GoogleMap Shortcode',
                            body: [{
                                    type: 'textbox',
                                    name: 'latitude',
                                    label: 'Latitude',
                                    tooltip: 'Enter latitude value.'

                                },
                                {
                                    type: 'textbox',
                                    name: 'longitude',
                                    label: 'Longitude',
                                    tooltip: 'Enter longitude value.'
                                },
                                {
                                    type: 'textbox',
                                    name: 'zoom',
                                    label: 'Zoom',
                                    value: '14',
                                    tooltip: 'Enter map zoom.'
                                },
                                {
                                    type: 'textbox',
                                    name: 'shade',
                                    label: 'Color',
                                    value: '#0066cc',
                                    tooltip: 'Enter map color e.g. #0066cc.'
                                },
                                {
                                    type: 'textbox',
                                    name: 'saturation',
                                    label: 'Saturation',
                                    value: '25',
                                    tooltip: 'Enter map saturation value between -100 to 100.'
                                },
                                {
                                    type: 'textbox',
                                    name: 'marker',
                                    label: 'Marker Image',
                                    value: inafx_theme.themePath + '/assets/images/map-marker.png',
                                    tooltip: 'Enter the path to marker image.'
                                }
                            ],
                            onsubmit: function (e) {
                                editor.insertContent('[gmap latitude="' + e.data.latitude + '" longitude="' + e.data.longitude + '" zoom="' + e.data.zoom + '" shade="' + e.data.shade + '" saturation="' + e.data.saturation + '" marker="' + e.data.marker + '"]address here[/gmap]');
                            }
                        });
                    }
                },

                {
                    text: 'Embed',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert Embed Shortcode',
                            body: [{
                                type: 'textbox',
                                name: 'fileURL',
                                label: 'File URL',
                                tooltip: 'Enter the url to the media. YouTube example: http://youtube.com/watch?v=xxxxxxxxxx. Vimeo example: http://vimeo.com/xxxxxxxx. SoundCloud example: https://soundcloud.com/user/track-name'
                            },
                            {
                                type: 'listbox',
                                name: 'style',
                                label: 'Select the Embed style',
                                values: [
                                    { text: 'Responsive', value: 'responsive' },
                                    { text: 'Fixed', value: 'fixed' },
                                ]
                            },
                            {
                                type: 'textbox',
                                name: 'width',
                                value: '640',
                                label: 'Enter the width of your embedded media'
                            },
                            {
                                type: 'textbox',
                                name: 'height',
                                value: '360',
                                label: 'Enter the height of your embedded media'

                            },
                            {
                                type: 'listbox',
                                name: 'soundcloud_style',
                                label: 'Select the SoundCloud Visual style',
                                values: [
                                    { text: 'Large', value: 'true' },
                                    { text: 'Compact', value: 'false' },
                                ]
                            }],
                            onsubmit: function (e) {
                                editor.insertContent('[embed_media file="' + e.data.fileURL + '" style="' + e.data.style + '" width="' + e.data.width + '" height="' + e.data.height + '" soundcloud_visual="' + e.data.soundcloud_style + '"][/embed_media]');
                            }
                        });
                    }
                },
		        {
		            text: 'Full width image',
		            onclick: function () {
		                editor.windowManager.open({
		                    title: 'Insert Full width image Shortcode',
		                    body: [{
		                        type: 'textbox',
		                        name: 'image',
		                        label: 'Image URL',
		                        tooltip: 'Enter the image URL'
		                    },
                            {
		                        type: 'textbox',
		                        name: 'url',
		                        label: 'URL',
		                        tooltip: 'Enter any URL'
		                    },
                            {
		                        type: 'listbox',
		                        name: 'zoomeffect',
		                        label: 'Zoom Effect',
                                values: [
                                    { text: 'Yes', value: 'true' },
                                    { text: 'No', value: 'false' },
                                ]
		                    },
                            {
		                        type: 'listbox',
		                        name: 'aligncenter',
		                        label: 'Align Center',
                                values: [
                                    { text: 'Yes', value: 'true' },
                                    { text: 'No', value: 'false' },
                                ]
		                    },
                            {
		                        type: 'listbox',
		                        name: 'padding',
		                        label: 'Padding',
                                values: [
                                    { text: 'Double', value: 'double' },
                                    { text: 'Normal', value: 'normal' },
                                ]
		                    }],
		                    onsubmit: function (e) {
		                        editor.insertContent('[fullwidthimage photourl="' + e.data.image + '" url="' + e.data.url + '" zoomeffect="' + e.data.zoomeffect + '" align_center="' + e.data.align_center + '" padding="' + e.data.padding + '"]optional description content[/fullwidthimage]');
		                    }
		                });
		            }
		        },
                {
                    text: 'Gallery',
                    onclick: function () {
                        editor.windowManager.open({
                            title: 'Insert Gallery Shortcode',
                            body: [{
                                type: 'textbox',
                                name: 'ids',
                                label: 'Image IDs',
                                tooltip: 'Enter the comma separated image ids. e.g. 22, 120, 221'
                            },
                            {
                                type: 'listbox',
                                name: 'style',
                                label: 'Select the Gallery style',
                                values: [
                                    { text: 'Slideshow', value: 'slideshow' },
                                    { text: 'Grid', value: 'grid' },
                                ]
                            },
                            {
                                type: 'textbox',
                                name: 'height',
                                value: '200',
                                label: 'Enter the target height for masonry style'
                            },
                            {
                                type: 'textbox',
                                name: 'margin',
                                value: '10',
                                label: 'Enter the margin for masonry style'

                            }],
                            onsubmit: function (e) {
                                editor.insertContent('[gallery ids="' + e.data.ids + '" style="' + e.data.style + '" height="' + e.data.height + '" margin="' + e.data.margin + '"]');
                            }
                        });
                    }
                },

                {
                    text: 'Contact Form',
                    value: '[contactform name_label="Name:" name_placeholder="Name" email_label="E-mail:" email_placeholder="E-mail ID" message_label="Message:" message_placeholder="Message" captcha_placeholder="Are you human?" button_text="send"]',
                    onclick: function () { editor.insertContent(this.value()); }
                },
            ]
        });
    });
})();

function load_icons() {
    var icons_list = [
{ text: 'Select Icon Name', value: '' },
{ text: 'glyphicon-asterisk', value: 'glyphicon glyphicon-asterisk' },
{ text: 'glyphicon-plus', value: 'glyphicon glyphicon-plus' },
{ text: 'glyphicon-euro', value: 'glyphicon glyphicon-euro' },
{ text: 'glyphicon-minus', value: 'glyphicon glyphicon-minus' },
{ text: 'glyphicon-cloud', value: 'glyphicon glyphicon-cloud' },
{ text: 'glyphicon-envelope', value: 'glyphicon glyphicon-envelope' },
{ text: 'glyphicon-pencil', value: 'glyphicon glyphicon-pencil' },
{ text: 'glyphicon-glass', value: 'glyphicon glyphicon-glass' },
{ text: 'glyphicon-music', value: 'glyphicon glyphicon-music' },
{ text: 'glyphicon-search', value: 'glyphicon glyphicon-search' },
{ text: 'glyphicon-heart', value: 'glyphicon glyphicon-heart' },
{ text: 'glyphicon-star', value: 'glyphicon glyphicon-star' },
{ text: 'glyphicon-star-empty', value: 'glyphicon glyphicon-star-empty' },
{ text: 'glyphicon-user', value: 'glyphicon glyphicon-user' },
{ text: 'glyphicon-film', value: 'glyphicon glyphicon-film' },
{ text: 'glyphicon-th-large', value: 'glyphicon glyphicon-th-large' },
{ text: 'glyphicon-th', value: 'glyphicon glyphicon-th' },
{ text: 'glyphicon-th-list', value: 'glyphicon glyphicon-th-list' },
{ text: 'glyphicon-ok', value: 'glyphicon glyphicon-ok' },
{ text: 'glyphicon-remove', value: 'glyphicon glyphicon-remove' },
{ text: 'glyphicon-zoom-in', value: 'glyphicon glyphicon-zoom-in' },
{ text: 'glyphicon-zoom-out', value: 'glyphicon glyphicon-zoom-out' },
{ text: 'glyphicon-off', value: 'glyphicon glyphicon-off' },
{ text: 'glyphicon-signal', value: 'glyphicon glyphicon-signal' },
{ text: 'glyphicon-cog', value: 'glyphicon glyphicon-cog' },
{ text: 'glyphicon-trash', value: 'glyphicon glyphicon-trash' },
{ text: 'glyphicon-home', value: 'glyphicon glyphicon-home' },
{ text: 'glyphicon-file', value: 'glyphicon glyphicon-file' },
{ text: 'glyphicon-time', value: 'glyphicon glyphicon-time' },
{ text: 'glyphicon-road', value: 'glyphicon glyphicon-road' },
{ text: 'glyphicon-download-alt', value: 'glyphicon glyphicon-download-alt' },
{ text: 'glyphicon-download', value: 'glyphicon glyphicon-download' },
{ text: 'glyphicon-upload', value: 'glyphicon glyphicon-upload' },
{ text: 'glyphicon-inbox', value: 'glyphicon glyphicon-inbox' },
{ text: 'glyphicon-play-circle', value: 'glyphicon glyphicon-play-circle' },
{ text: 'glyphicon-repeat', value: 'glyphicon glyphicon-repeat' },
{ text: 'glyphicon-refresh', value: 'glyphicon glyphicon-refresh' },
{ text: 'glyphicon-list-alt', value: 'glyphicon glyphicon-list-alt' },
{ text: 'glyphicon-lock', value: 'glyphicon glyphicon-lock' },
{ text: 'glyphicon-flag', value: 'glyphicon glyphicon-flag' },
{ text: 'glyphicon-headphones', value: 'glyphicon glyphicon-headphones' },
{ text: 'glyphicon-volume-off', value: 'glyphicon glyphicon-volume-off' },
{ text: 'glyphicon-volume-down', value: 'glyphicon glyphicon-volume-down' },
{ text: 'glyphicon-volume-up', value: 'glyphicon glyphicon-volume-up' },
{ text: 'glyphicon-qrcode', value: 'glyphicon glyphicon-qrcode' },
{ text: 'glyphicon-barcode', value: 'glyphicon glyphicon-barcode' },
{ text: 'glyphicon-tag', value: 'glyphicon glyphicon-tag' },
{ text: 'glyphicon-tags', value: 'glyphicon glyphicon-tags' },
{ text: 'glyphicon-book', value: 'glyphicon glyphicon-book' },
{ text: 'glyphicon-bookmark', value: 'glyphicon glyphicon-bookmark' },
{ text: 'glyphicon-print', value: 'glyphicon glyphicon-print' },
{ text: 'glyphicon-camera', value: 'glyphicon glyphicon-camera' },
{ text: 'glyphicon-font', value: 'glyphicon glyphicon-font' },
{ text: 'glyphicon-bold', value: 'glyphicon glyphicon-bold' },
{ text: 'glyphicon-italic', value: 'glyphicon glyphicon-italic' },
{ text: 'glyphicon-text-height', value: 'glyphicon glyphicon-text-height' },
{ text: 'glyphicon-text-width', value: 'glyphicon glyphicon-text-width' },
{ text: 'glyphicon-align-left', value: 'glyphicon glyphicon-align-left' },
{ text: 'glyphicon-align-center', value: 'glyphicon glyphicon-align-center' },
{ text: 'glyphicon-align-right', value: 'glyphicon glyphicon-align-right' },
{ text: 'glyphicon-align-justify', value: 'glyphicon glyphicon-align-justify' },
{ text: 'glyphicon-list', value: 'glyphicon glyphicon-list' },
{ text: 'glyphicon-indent-left', value: 'glyphicon glyphicon-indent-left' },
{ text: 'glyphicon-indent-right', value: 'glyphicon glyphicon-indent-right' },
{ text: 'glyphicon-facetime-video', value: 'glyphicon glyphicon-facetime-video' },
{ text: 'glyphicon-picture', value: 'glyphicon glyphicon-picture' },
{ text: 'glyphicon-map-marker', value: 'glyphicon glyphicon-map-marker' },
{ text: 'glyphicon-adjust', value: 'glyphicon glyphicon-adjust' },
{ text: 'glyphicon-tint', value: 'glyphicon glyphicon-tint' },
{ text: 'glyphicon-edit', value: 'glyphicon glyphicon-edit' },
{ text: 'glyphicon-share', value: 'glyphicon glyphicon-share' },
{ text: 'glyphicon-check', value: 'glyphicon glyphicon-check' },
{ text: 'glyphicon-move', value: 'glyphicon glyphicon-move' },
{ text: 'glyphicon-step-backward', value: 'glyphicon glyphicon-step-backward' },
{ text: 'glyphicon-fast-backward', value: 'glyphicon glyphicon-fast-backward' },
{ text: 'glyphicon-backward', value: 'glyphicon glyphicon-backward' },
{ text: 'glyphicon-play', value: 'glyphicon glyphicon-play' },
{ text: 'glyphicon-pause', value: 'glyphicon glyphicon-pause' },
{ text: 'glyphicon-stop', value: 'glyphicon glyphicon-stop' },
{ text: 'glyphicon-forward', value: 'glyphicon glyphicon-forward' },
{ text: 'glyphicon-fast-forward', value: 'glyphicon glyphicon-fast-forward' },
{ text: 'glyphicon-step-forward', value: 'glyphicon glyphicon-step-forward' },
{ text: 'glyphicon-eject', value: 'glyphicon glyphicon-eject' },
{ text: 'glyphicon-chevron-left', value: 'glyphicon glyphicon-chevron-left' },
{ text: 'glyphicon-chevron-right', value: 'glyphicon glyphicon-chevron-right' },
{ text: 'glyphicon-plus-sign', value: 'glyphicon glyphicon-plus-sign' },
{ text: 'glyphicon-minus-sign', value: 'glyphicon glyphicon-minus-sign' },
{ text: 'glyphicon-remove-sign', value: 'glyphicon glyphicon-remove-sign' },
{ text: 'glyphicon-ok-sign', value: 'glyphicon glyphicon-ok-sign' },
{ text: 'glyphicon-question-sign', value: 'glyphicon glyphicon-question-sign' },
{ text: 'glyphicon-info-sign', value: 'glyphicon glyphicon-info-sign' },
{ text: 'glyphicon-screenshot', value: 'glyphicon glyphicon-screenshot' },
{ text: 'glyphicon-remove-circle', value: 'glyphicon glyphicon-remove-circle' },
{ text: 'glyphicon-ok-circle', value: 'glyphicon glyphicon-ok-circle' },
{ text: 'glyphicon-ban-circle', value: 'glyphicon glyphicon-ban-circle' },
{ text: 'glyphicon-arrow-left', value: 'glyphicon glyphicon-arrow-left' },
{ text: 'glyphicon-arrow-right', value: 'glyphicon glyphicon-arrow-right' },
{ text: 'glyphicon-arrow-up', value: 'glyphicon glyphicon-arrow-up' },
{ text: 'glyphicon-arrow-down', value: 'glyphicon glyphicon-arrow-down' },
{ text: 'glyphicon-share-alt', value: 'glyphicon glyphicon-share-alt' },
{ text: 'glyphicon-resize-full', value: 'glyphicon glyphicon-resize-full' },
{ text: 'glyphicon-resize-small', value: 'glyphicon glyphicon-resize-small' },
{ text: 'glyphicon-exclamation-sign', value: 'glyphicon glyphicon-exclamation-sign' },
{ text: 'glyphicon-gift', value: 'glyphicon glyphicon-gift' },
{ text: 'glyphicon-leaf', value: 'glyphicon glyphicon-leaf' },
{ text: 'glyphicon-fire', value: 'glyphicon glyphicon-fire' },
{ text: 'glyphicon-eye-open', value: 'glyphicon glyphicon-eye-open' },
{ text: 'glyphicon-eye-close', value: 'glyphicon glyphicon-eye-close' },
{ text: 'glyphicon-warning-sign', value: 'glyphicon glyphicon-warning-sign' },
{ text: 'glyphicon-plane', value: 'glyphicon glyphicon-plane' },
{ text: 'glyphicon-calendar', value: 'glyphicon glyphicon-calendar' },
{ text: 'glyphicon-random', value: 'glyphicon glyphicon-random' },
{ text: 'glyphicon-comment', value: 'glyphicon glyphicon-comment' },
{ text: 'glyphicon-magnet', value: 'glyphicon glyphicon-magnet' },
{ text: 'glyphicon-chevron-up', value: 'glyphicon glyphicon-chevron-up' },
{ text: 'glyphicon-chevron-down', value: 'glyphicon glyphicon-chevron-down' },
{ text: 'glyphicon-retweet', value: 'glyphicon glyphicon-retweet' },
{ text: 'glyphicon-shopping-cart', value: 'glyphicon glyphicon-shopping-cart' },
{ text: 'glyphicon-folder-close', value: 'glyphicon glyphicon-folder-close' },
{ text: 'glyphicon-folder-open', value: 'glyphicon glyphicon-folder-open' },
{ text: 'glyphicon-resize-vertical', value: 'glyphicon glyphicon-resize-vertical' },
{ text: 'glyphicon-resize-horizontal', value: 'glyphicon glyphicon-resize-horizontal' },
{ text: 'glyphicon-hdd', value: 'glyphicon glyphicon-hdd' },
{ text: 'glyphicon-bullhorn', value: 'glyphicon glyphicon-bullhorn' },
{ text: 'glyphicon-bell', value: 'glyphicon glyphicon-bell' },
{ text: 'glyphicon-certificate', value: 'glyphicon glyphicon-certificate' },
{ text: 'glyphicon-thumbs-up', value: 'glyphicon glyphicon-thumbs-up' },
{ text: 'glyphicon-thumbs-down', value: 'glyphicon glyphicon-thumbs-down' },
{ text: 'glyphicon-hand-right', value: 'glyphicon glyphicon-hand-right' },
{ text: 'glyphicon-hand-left', value: 'glyphicon glyphicon-hand-left' },
{ text: 'glyphicon-hand-up', value: 'glyphicon glyphicon-hand-up' },
{ text: 'glyphicon-hand-down', value: 'glyphicon glyphicon-hand-down' },
{ text: 'glyphicon-circle-arrow-right', value: 'glyphicon glyphicon-circle-arrow-right' },
{ text: 'glyphicon-circle-arrow-left', value: 'glyphicon glyphicon-circle-arrow-left' },
{ text: 'glyphicon-circle-arrow-up', value: 'glyphicon glyphicon-circle-arrow-up' },
{ text: 'glyphicon-circle-arrow-down', value: 'glyphicon glyphicon-circle-arrow-down' },
{ text: 'glyphicon-globe', value: 'glyphicon glyphicon-globe' },
{ text: 'glyphicon-wrench', value: 'glyphicon glyphicon-wrench' },
{ text: 'glyphicon-tasks', value: 'glyphicon glyphicon-tasks' },
{ text: 'glyphicon-filter', value: 'glyphicon glyphicon-filter' },
{ text: 'glyphicon-briefcase', value: 'glyphicon glyphicon-briefcase' },
{ text: 'glyphicon-fullscreen', value: 'glyphicon glyphicon-fullscreen' },
{ text: 'glyphicon-dashboard', value: 'glyphicon glyphicon-dashboard' },
{ text: 'glyphicon-paperclip', value: 'glyphicon glyphicon-paperclip' },
{ text: 'glyphicon-heart-empty', value: 'glyphicon glyphicon-heart-empty' },
{ text: 'glyphicon-link', value: 'glyphicon glyphicon-link' },
{ text: 'glyphicon-phone', value: 'glyphicon glyphicon-phone' },
{ text: 'glyphicon-pushpin', value: 'glyphicon glyphicon-pushpin' },
{ text: 'glyphicon-usd', value: 'glyphicon glyphicon-usd' },
{ text: 'glyphicon-gbp', value: 'glyphicon glyphicon-gbp' },
{ text: 'glyphicon-sort', value: 'glyphicon glyphicon-sort' },
{ text: 'glyphicon-sort-by-alphabet', value: 'glyphicon glyphicon-sort-by-alphabet' },
{ text: 'glyphicon-sort-by-alphabet-alt', value: 'glyphicon glyphicon-sort-by-alphabet-alt' },
{ text: 'glyphicon-sort-by-order', value: 'glyphicon glyphicon-sort-by-order' },
{ text: 'glyphicon-sort-by-order-alt', value: 'glyphicon glyphicon-sort-by-order-alt' },
{ text: 'glyphicon-sort-by-attributes', value: 'glyphicon glyphicon-sort-by-attributes' },
{ text: 'glyphicon-sort-by-attributes-alt', value: 'glyphicon glyphicon-sort-by-attributes-alt' },
{ text: 'glyphicon-unchecked', value: 'glyphicon glyphicon-unchecked' },
{ text: 'glyphicon-expand', value: 'glyphicon glyphicon-expand' },
{ text: 'glyphicon-collapse-down', value: 'glyphicon glyphicon-collapse-down' },
{ text: 'glyphicon-collapse-up', value: 'glyphicon glyphicon-collapse-up' },
{ text: 'glyphicon-log-in', value: 'glyphicon glyphicon-log-in' },
{ text: 'glyphicon-flash', value: 'glyphicon glyphicon-flash' },
{ text: 'glyphicon-log-out', value: 'glyphicon glyphicon-log-out' },
{ text: 'glyphicon-new-window', value: 'glyphicon glyphicon-new-window' },
{ text: 'glyphicon-record', value: 'glyphicon glyphicon-record' },
{ text: 'glyphicon-save', value: 'glyphicon glyphicon-save' },
{ text: 'glyphicon-open', value: 'glyphicon glyphicon-open' },
{ text: 'glyphicon-saved', value: 'glyphicon glyphicon-saved' },
{ text: 'glyphicon-import', value: 'glyphicon glyphicon-import' },
{ text: 'glyphicon-export', value: 'glyphicon glyphicon-export' },
{ text: 'glyphicon-send', value: 'glyphicon glyphicon-send' },
{ text: 'glyphicon-floppy-disk', value: 'glyphicon glyphicon-floppy-disk' },
{ text: 'glyphicon-floppy-saved', value: 'glyphicon glyphicon-floppy-saved' },
{ text: 'glyphicon-floppy-remove', value: 'glyphicon glyphicon-floppy-remove' },
{ text: 'glyphicon-floppy-save', value: 'glyphicon glyphicon-floppy-save' },
{ text: 'glyphicon-floppy-open', value: 'glyphicon glyphicon-floppy-open' },
{ text: 'glyphicon-credit-card', value: 'glyphicon glyphicon-credit-card' },
{ text: 'glyphicon-transfer', value: 'glyphicon glyphicon-transfer' },
{ text: 'glyphicon-cutlery', value: 'glyphicon glyphicon-cutlery' },
{ text: 'glyphicon-header', value: 'glyphicon glyphicon-header' },
{ text: 'glyphicon-compressed', value: 'glyphicon glyphicon-compressed' },
{ text: 'glyphicon-earphone', value: 'glyphicon glyphicon-earphone' },
{ text: 'glyphicon-phone-alt', value: 'glyphicon glyphicon-phone-alt' },
{ text: 'glyphicon-tower', value: 'glyphicon glyphicon-tower' },
{ text: 'glyphicon-stats', value: 'glyphicon glyphicon-stats' },
{ text: 'glyphicon-sd-video', value: 'glyphicon glyphicon-sd-video' },
{ text: 'glyphicon-hd-video', value: 'glyphicon glyphicon-hd-video' },
{ text: 'glyphicon-subtitles', value: 'glyphicon glyphicon-subtitles' },
{ text: 'glyphicon-sound-stereo', value: 'glyphicon glyphicon-sound-stereo' },
{ text: 'glyphicon-sound-dolby', value: 'glyphicon glyphicon-sound-dolby' },
{ text: 'glyphicon-sound-5-1', value: 'glyphicon glyphicon-sound-5-1' },
{ text: 'glyphicon-sound-6-1', value: 'glyphicon glyphicon-sound-6-1' },
{ text: 'glyphicon-sound-7-1', value: 'glyphicon glyphicon-sound-7-1' },
{ text: 'glyphicon-copyright-mark', value: 'glyphicon glyphicon-copyright-mark' },
{ text: 'glyphicon-registration-mark', value: 'glyphicon glyphicon-registration-mark' },
{ text: 'glyphicon-cloud-download', value: 'glyphicon glyphicon-cloud-download' },
{ text: 'glyphicon-cloud-upload', value: 'glyphicon glyphicon-cloud-upload' },
{ text: 'glyphicon-tree-conifer', value: 'glyphicon glyphicon-tree-conifer' },
{ text: 'glyphicon-tree-deciduous', value: 'glyphicon glyphicon-tree-deciduous' },
{ text: 'fa-adjust', value: 'fa fa-adjust' },
{ text: 'fa-adn', value: 'fa fa-adn' },
{ text: 'fa-align-center', value: 'fa fa-align-center' },
{ text: 'fa-align-justify', value: 'fa fa-align-justify' },
{ text: 'fa-align-left', value: 'fa fa-align-left' },
{ text: 'fa-align-right', value: 'fa fa-align-right' },
{ text: 'fa-ambulance', value: 'fa fa-ambulance' },
{ text: 'fa-anchor', value: 'fa fa-anchor' },
{ text: 'fa-android', value: 'fa fa-android' },
{ text: 'fa-angle-double-down', value: 'fa fa-angle-double-down' },
{ text: 'fa-angle-double-left', value: 'fa fa-angle-double-left' },
{ text: 'fa-angle-double-right', value: 'fa fa-angle-double-right' },
{ text: 'fa-angle-double-up', value: 'fa fa-angle-double-up' },
{ text: 'fa-angle-down', value: 'fa fa-angle-down' },
{ text: 'fa-angle-left', value: 'fa fa-angle-left' },
{ text: 'fa-angle-right', value: 'fa fa-angle-right' },
{ text: 'fa-angle-up', value: 'fa fa-angle-up' },
{ text: 'fa-apple', value: 'fa fa-apple' },
{ text: 'fa-archive', value: 'fa fa-archive' },
{ text: 'fa-arrow-circle-down', value: 'fa fa-arrow-circle-down' },
{ text: 'fa-arrow-circle-left', value: 'fa fa-arrow-circle-left' },
{ text: 'fa-arrow-circle-o-down', value: 'fa fa-arrow-circle-o-down' },
{ text: 'fa-arrow-circle-o-left', value: 'fa fa-arrow-circle-o-left' },
{ text: 'fa-arrow-circle-o-right', value: 'fa fa-arrow-circle-o-right' },
{ text: 'fa-arrow-circle-o-up', value: 'fa fa-arrow-circle-o-up' },
{ text: 'fa-arrow-circle-right', value: 'fa fa-arrow-circle-right' },
{ text: 'fa-arrow-circle-up', value: 'fa fa-arrow-circle-up' },
{ text: 'fa-arrow-down', value: 'fa fa-arrow-down' },
{ text: 'fa-arrow-left', value: 'fa fa-arrow-left' },
{ text: 'fa-arrow-right', value: 'fa fa-arrow-right' },
{ text: 'fa-arrow-up', value: 'fa fa-arrow-up' },
{ text: 'fa-arrows', value: 'fa fa-arrows' },
{ text: 'fa-arrows-alt', value: 'fa fa-arrows-alt' },
{ text: 'fa-arrows-h', value: 'fa fa-arrows-h' },
{ text: 'fa-arrows-v', value: 'fa fa-arrows-v' },
{ text: 'fa-asterisk', value: 'fa fa-asterisk' },
{ text: 'fa-automobile', value: 'fa fa-automobile' },
{ text: 'fa-backward', value: 'fa fa-backward' },
{ text: 'fa-ban', value: 'fa fa-ban' },
{ text: 'fa-bank', value: 'fa fa-bank' },
{ text: 'fa-bar-chart-o', value: 'fa fa-bar-chart-o' },
{ text: 'fa-barcode', value: 'fa fa-barcode' },
{ text: 'fa-bars', value: 'fa fa-bars' },
{ text: 'fa-beer', value: 'fa fa-beer' },
{ text: 'fa-behance', value: 'fa fa-behance' },
{ text: 'fa-behance-square', value: 'fa fa-behance-square' },
{ text: 'fa-bell', value: 'fa fa-bell' },
{ text: 'fa-bell-o', value: 'fa fa-bell-o' },
{ text: 'fa-bitbucket', value: 'fa fa-bitbucket' },
{ text: 'fa-bitbucket-square', value: 'fa fa-bitbucket-square' },
{ text: 'fa-bitcoin', value: 'fa fa-bitcoin' },
{ text: 'fa-bold', value: 'fa fa-bold' },
{ text: 'fa-bolt', value: 'fa fa-bolt' },
{ text: 'fa-bomb', value: 'fa fa-bomb' },
{ text: 'fa-book', value: 'fa fa-book' },
{ text: 'fa-bookmark', value: 'fa fa-bookmark' },
{ text: 'fa-bookmark-o', value: 'fa fa-bookmark-o' },
{ text: 'fa-briefcase', value: 'fa fa-briefcase' },
{ text: 'fa-btc', value: 'fa fa-btc' },
{ text: 'fa-bug', value: 'fa fa-bug' },
{ text: 'fa-building', value: 'fa fa-building' },
{ text: 'fa-building-o', value: 'fa fa-building-o' },
{ text: 'fa-bullhorn', value: 'fa fa-bullhorn' },
{ text: 'fa-bullseye', value: 'fa fa-bullseye' },
{ text: 'fa-cab', value: 'fa fa-cab' },
{ text: 'fa-calendar', value: 'fa fa-calendar' },
{ text: 'fa-calendar-o', value: 'fa fa-calendar-o' },
{ text: 'fa-camera', value: 'fa fa-camera' },
{ text: 'fa-camera-retro', value: 'fa fa-camera-retro' },
{ text: 'fa-car', value: 'fa fa-car' },
{ text: 'fa-caret-down', value: 'fa fa-caret-down' },
{ text: 'fa-caret-left', value: 'fa fa-caret-left' },
{ text: 'fa-caret-right', value: 'fa fa-caret-right' },
{ text: 'fa-caret-square-o-down', value: 'fa fa-caret-square-o-down' },
{ text: 'fa-caret-square-o-left', value: 'fa fa-caret-square-o-left' },
{ text: 'fa-caret-square-o-right', value: 'fa fa-caret-square-o-right' },
{ text: 'fa-caret-square-o-up', value: 'fa fa-caret-square-o-up' },
{ text: 'fa-caret-up', value: 'fa fa-caret-up' },
{ text: 'fa-certificate', value: 'fa fa-certificate' },
{ text: 'fa-chain', value: 'fa fa-chain' },
{ text: 'fa-chain-broken', value: 'fa fa-chain-broken' },
{ text: 'fa-check', value: 'fa fa-check' },
{ text: 'fa-check-circle', value: 'fa fa-check-circle' },
{ text: 'fa-check-circle-o', value: 'fa fa-check-circle-o' },
{ text: 'fa-check-square', value: 'fa fa-check-square' },
{ text: 'fa-check-square-o', value: 'fa fa-check-square-o' },
{ text: 'fa-chevron-circle-down', value: 'fa fa-chevron-circle-down' },
{ text: 'fa-chevron-circle-left', value: 'fa fa-chevron-circle-left' },
{ text: 'fa-chevron-circle-right', value: 'fa fa-chevron-circle-right' },
{ text: 'fa-chevron-circle-up', value: 'fa fa-chevron-circle-up' },
{ text: 'fa-chevron-down', value: 'fa fa-chevron-down' },
{ text: 'fa-chevron-left', value: 'fa fa-chevron-left' },
{ text: 'fa-chevron-right', value: 'fa fa-chevron-right' },
{ text: 'fa-chevron-up', value: 'fa fa-chevron-up' },
{ text: 'fa-child', value: 'fa fa-child' },
{ text: 'fa-circle', value: 'fa fa-circle' },
{ text: 'fa-circle-o', value: 'fa fa-circle-o' },
{ text: 'fa-circle-o-notch', value: 'fa fa-circle-o-notch' },
{ text: 'fa-circle-thin', value: 'fa fa-circle-thin' },
{ text: 'fa-clipboard', value: 'fa fa-clipboard' },
{ text: 'fa-clock-o', value: 'fa fa-clock-o' },
{ text: 'fa-cloud', value: 'fa fa-cloud' },
{ text: 'fa-cloud-download', value: 'fa fa-cloud-download' },
{ text: 'fa-cloud-upload', value: 'fa fa-cloud-upload' },
{ text: 'fa-cny', value: 'fa fa-cny' },
{ text: 'fa-code', value: 'fa fa-code' },
{ text: 'fa-code-fork', value: 'fa fa-code-fork' },
{ text: 'fa-codepen', value: 'fa fa-codepen' },
{ text: 'fa-coffee', value: 'fa fa-coffee' },
{ text: 'fa-cog', value: 'fa fa-cog' },
{ text: 'fa-cogs', value: 'fa fa-cogs' },
{ text: 'fa-columns', value: 'fa fa-columns' },
{ text: 'fa-comment', value: 'fa fa-comment' },
{ text: 'fa-comment-o', value: 'fa fa-comment-o' },
{ text: 'fa-comments', value: 'fa fa-comments' },
{ text: 'fa-comments-o', value: 'fa fa-comments-o' },
{ text: 'fa-compass', value: 'fa fa-compass' },
{ text: 'fa-compress', value: 'fa fa-compress' },
{ text: 'fa-copy', value: 'fa fa-copy' },
{ text: 'fa-credit-card', value: 'fa fa-credit-card' },
{ text: 'fa-crop', value: 'fa fa-crop' },
{ text: 'fa-crosshairs', value: 'fa fa-crosshairs' },
{ text: 'fa-css3', value: 'fa fa-css3' },
{ text: 'fa-cube', value: 'fa fa-cube' },
{ text: 'fa-cubes', value: 'fa fa-cubes' },
{ text: 'fa-cut', value: 'fa fa-cut' },
{ text: 'fa-cutlery', value: 'fa fa-cutlery' },
{ text: 'fa-dashboard', value: 'fa fa-dashboard' },
{ text: 'fa-database', value: 'fa fa-database' },
{ text: 'fa-dedent', value: 'fa fa-dedent' },
{ text: 'fa-delicious', value: 'fa fa-delicious' },
{ text: 'fa-desktop', value: 'fa fa-desktop' },
{ text: 'fa-deviantart', value: 'fa fa-deviantart' },
{ text: 'fa-digg', value: 'fa fa-digg' },
{ text: 'fa-dollar', value: 'fa fa-dollar' },
{ text: 'fa-dot-circle-o', value: 'fa fa-dot-circle-o' },
{ text: 'fa-download', value: 'fa fa-download' },
{ text: 'fa-dribbble', value: 'fa fa-dribbble' },
{ text: 'fa-dropbox', value: 'fa fa-dropbox' },
{ text: 'fa-drupal', value: 'fa fa-drupal' },
{ text: 'fa-edit', value: 'fa fa-edit' },
{ text: 'fa-eject', value: 'fa fa-eject' },
{ text: 'fa-ellipsis-h', value: 'fa fa-ellipsis-h' },
{ text: 'fa-ellipsis-v', value: 'fa fa-ellipsis-v' },
{ text: 'fa-empire', value: 'fa fa-empire' },
{ text: 'fa-envelope', value: 'fa fa-envelope' },
{ text: 'fa-envelope-o', value: 'fa fa-envelope-o' },
{ text: 'fa-envelope-square', value: 'fa fa-envelope-square' },
{ text: 'fa-eraser', value: 'fa fa-eraser' },
{ text: 'fa-eur', value: 'fa fa-eur' },
{ text: 'fa-euro', value: 'fa fa-euro' },
{ text: 'fa-exchange', value: 'fa fa-exchange' },
{ text: 'fa-exclamation', value: 'fa fa-exclamation' },
{ text: 'fa-exclamation-circle', value: 'fa fa-exclamation-circle' },
{ text: 'fa-exclamation-triangle', value: 'fa fa-exclamation-triangle' },
{ text: 'fa-expand', value: 'fa fa-expand' },
{ text: 'fa-external-link', value: 'fa fa-external-link' },
{ text: 'fa-external-link-square', value: 'fa fa-external-link-square' },
{ text: 'fa-eye', value: 'fa fa-eye' },
{ text: 'fa-eye-slash', value: 'fa fa-eye-slash' },
{ text: 'fa-facebook', value: 'fa fa-facebook' },
{ text: 'fa-facebook-square', value: 'fa fa-facebook-square' },
{ text: 'fa-fast-backward', value: 'fa fa-fast-backward' },
{ text: 'fa-fast-forward', value: 'fa fa-fast-forward' },
{ text: 'fa-fax', value: 'fa fa-fax' },
{ text: 'fa-female', value: 'fa fa-female' },
{ text: 'fa-fighter-jet', value: 'fa fa-fighter-jet' },
{ text: 'fa-file', value: 'fa fa-file' },
{ text: 'fa-file-archive-o', value: 'fa fa-file-archive-o' },
{ text: 'fa-file-audio-o', value: 'fa fa-file-audio-o' },
{ text: 'fa-file-code-o', value: 'fa fa-file-code-o' },
{ text: 'fa-file-excel-o', value: 'fa fa-file-excel-o' },
{ text: 'fa-file-image-o', value: 'fa fa-file-image-o' },
{ text: 'fa-file-movie-o', value: 'fa fa-file-movie-o' },
{ text: 'fa-file-o', value: 'fa fa-file-o' },
{ text: 'fa-file-pdf-o', value: 'fa fa-file-pdf-o' },
{ text: 'fa-file-photo-o', value: 'fa fa-file-photo-o' },
{ text: 'fa-file-picture-o', value: 'fa fa-file-picture-o' },
{ text: 'fa-file-powerpoint-o', value: 'fa fa-file-powerpoint-o' },
{ text: 'fa-file-sound-o', value: 'fa fa-file-sound-o' },
{ text: 'fa-file-text', value: 'fa fa-file-text' },
{ text: 'fa-file-text-o', value: 'fa fa-file-text-o' },
{ text: 'fa-file-video-o', value: 'fa fa-file-video-o' },
{ text: 'fa-file-word-o', value: 'fa fa-file-word-o' },
{ text: 'fa-file-zip-o', value: 'fa fa-file-zip-o' },
{ text: 'fa-files-o', value: 'fa fa-files-o' },
{ text: 'fa-film', value: 'fa fa-film' },
{ text: 'fa-filter', value: 'fa fa-filter' },
{ text: 'fa-fire', value: 'fa fa-fire' },
{ text: 'fa-fire-extinguisher', value: 'fa fa-fire-extinguisher' },
{ text: 'fa-flag', value: 'fa fa-flag' },
{ text: 'fa-flag-checkered', value: 'fa fa-flag-checkered' },
{ text: 'fa-flag-o', value: 'fa fa-flag-o' },
{ text: 'fa-flash', value: 'fa fa-flash' },
{ text: 'fa-flask', value: 'fa fa-flask' },
{ text: 'fa-flickr', value: 'fa fa-flickr' },
{ text: 'fa-floppy-o', value: 'fa fa-floppy-o' },
{ text: 'fa-folder', value: 'fa fa-folder' },
{ text: 'fa-folder-o', value: 'fa fa-folder-o' },
{ text: 'fa-folder-open', value: 'fa fa-folder-open' },
{ text: 'fa-folder-open-o', value: 'fa fa-folder-open-o' },
{ text: 'fa-font', value: 'fa fa-font' },
{ text: 'fa-forward', value: 'fa fa-forward' },
{ text: 'fa-foursquare', value: 'fa fa-foursquare' },
{ text: 'fa-frown-o', value: 'fa fa-frown-o' },
{ text: 'fa-gamepad', value: 'fa fa-gamepad' },
{ text: 'fa-gavel', value: 'fa fa-gavel' },
{ text: 'fa-gbp', value: 'fa fa-gbp' },
{ text: 'fa-ge', value: 'fa fa-ge' },
{ text: 'fa-gear', value: 'fa fa-gear' },
{ text: 'fa-gears', value: 'fa fa-gears' },
{ text: 'fa-gift', value: 'fa fa-gift' },
{ text: 'fa-git', value: 'fa fa-git' },
{ text: 'fa-git-square', value: 'fa fa-git-square' },
{ text: 'fa-github', value: 'fa fa-github' },
{ text: 'fa-github-alt', value: 'fa fa-github-alt' },
{ text: 'fa-github-square', value: 'fa fa-github-square' },
{ text: 'fa-gittip', value: 'fa fa-gittip' },
{ text: 'fa-glass', value: 'fa fa-glass' },
{ text: 'fa-globe', value: 'fa fa-globe' },
{ text: 'fa-google', value: 'fa fa-google' },
{ text: 'fa-google-plus', value: 'fa fa-google-plus' },
{ text: 'fa-google-plus-square', value: 'fa fa-google-plus-square' },
{ text: 'fa-graduation-cap', value: 'fa fa-graduation-cap' },
{ text: 'fa-group', value: 'fa fa-group' },
{ text: 'fa-h-square', value: 'fa fa-h-square' },
{ text: 'fa-hacker-news', value: 'fa fa-hacker-news' },
{ text: 'fa-hand-o-down', value: 'fa fa-hand-o-down' },
{ text: 'fa-hand-o-left', value: 'fa fa-hand-o-left' },
{ text: 'fa-hand-o-right', value: 'fa fa-hand-o-right' },
{ text: 'fa-hand-o-up', value: 'fa fa-hand-o-up' },
{ text: 'fa-hdd-o', value: 'fa fa-hdd-o' },
{ text: 'fa-header', value: 'fa fa-header' },
{ text: 'fa-headphones', value: 'fa fa-headphones' },
{ text: 'fa-heart', value: 'fa fa-heart' },
{ text: 'fa-heart-o', value: 'fa fa-heart-o' },
{ text: 'fa-history', value: 'fa fa-history' },
{ text: 'fa-home', value: 'fa fa-home' },
{ text: 'fa-hospital-o', value: 'fa fa-hospital-o' },
{ text: 'fa-html5', value: 'fa fa-html5' },
{ text: 'fa-image', value: 'fa fa-image' },
{ text: 'fa-inbox', value: 'fa fa-inbox' },
{ text: 'fa-indent', value: 'fa fa-indent' },
{ text: 'fa-info', value: 'fa fa-info' },
{ text: 'fa-info-circle', value: 'fa fa-info-circle' },
{ text: 'fa-inr', value: 'fa fa-inr' },
{ text: 'fa-instagram', value: 'fa fa-instagram' },
{ text: 'fa-institution', value: 'fa fa-institution' },
{ text: 'fa-italic', value: 'fa fa-italic' },
{ text: 'fa-joomla', value: 'fa fa-joomla' },
{ text: 'fa-jpy', value: 'fa fa-jpy' },
{ text: 'fa-jsfiddle', value: 'fa fa-jsfiddle' },
{ text: 'fa-key', value: 'fa fa-key' },
{ text: 'fa-keyboard-o', value: 'fa fa-keyboard-o' },
{ text: 'fa-krw', value: 'fa fa-krw' },
{ text: 'fa-language', value: 'fa fa-language' },
{ text: 'fa-laptop', value: 'fa fa-laptop' },
{ text: 'fa-leaf', value: 'fa fa-leaf' },
{ text: 'fa-legal', value: 'fa fa-legal' },
{ text: 'fa-lemon-o', value: 'fa fa-lemon-o' },
{ text: 'fa-level-down', value: 'fa fa-level-down' },
{ text: 'fa-level-up', value: 'fa fa-level-up' },
{ text: 'fa-life-bouy', value: 'fa fa-life-bouy' },
{ text: 'fa-life-ring', value: 'fa fa-life-ring' },
{ text: 'fa-life-saver', value: 'fa fa-life-saver' },
{ text: 'fa-lightbulb-o', value: 'fa fa-lightbulb-o' },
{ text: 'fa-link', value: 'fa fa-link' },
{ text: 'fa-linkedin', value: 'fa fa-linkedin' },
{ text: 'fa-linkedin-square', value: 'fa fa-linkedin-square' },
{ text: 'fa-linux', value: 'fa fa-linux' },
{ text: 'fa-list', value: 'fa fa-list' },
{ text: 'fa-list-alt', value: 'fa fa-list-alt' },
{ text: 'fa-list-ol', value: 'fa fa-list-ol' },
{ text: 'fa-list-ul', value: 'fa fa-list-ul' },
{ text: 'fa-location-arrow', value: 'fa fa-location-arrow' },
{ text: 'fa-lock', value: 'fa fa-lock' },
{ text: 'fa-long-arrow-down', value: 'fa fa-long-arrow-down' },
{ text: 'fa-long-arrow-left', value: 'fa fa-long-arrow-left' },
{ text: 'fa-long-arrow-right', value: 'fa fa-long-arrow-right' },
{ text: 'fa-long-arrow-up', value: 'fa fa-long-arrow-up' },
{ text: 'fa-magic', value: 'fa fa-magic' },
{ text: 'fa-magnet', value: 'fa fa-magnet' },
{ text: 'fa-mail-forward', value: 'fa fa-mail-forward' },
{ text: 'fa-mail-reply', value: 'fa fa-mail-reply' },
{ text: 'fa-mail-reply-all', value: 'fa fa-mail-reply-all' },
{ text: 'fa-male', value: 'fa fa-male' },
{ text: 'fa-map-marker', value: 'fa fa-map-marker' },
{ text: 'fa-maxcdn', value: 'fa fa-maxcdn' },
{ text: 'fa-medkit', value: 'fa fa-medkit' },
{ text: 'fa-meh-o', value: 'fa fa-meh-o' },
{ text: 'fa-microphone', value: 'fa fa-microphone' },
{ text: 'fa-microphone-slash', value: 'fa fa-microphone-slash' },
{ text: 'fa-minus', value: 'fa fa-minus' },
{ text: 'fa-minus-circle', value: 'fa fa-minus-circle' },
{ text: 'fa-minus-square', value: 'fa fa-minus-square' },
{ text: 'fa-minus-square-o', value: 'fa fa-minus-square-o' },
{ text: 'fa-mobile', value: 'fa fa-mobile' },
{ text: 'fa-mobile-phone', value: 'fa fa-mobile-phone' },
{ text: 'fa-money', value: 'fa fa-money' },
{ text: 'fa-moon-o', value: 'fa fa-moon-o' },
{ text: 'fa-mortar-board', value: 'fa fa-mortar-board' },
{ text: 'fa-music', value: 'fa fa-music' },
{ text: 'fa-navicon', value: 'fa fa-navicon' },
{ text: 'fa-openid', value: 'fa fa-openid' },
{ text: 'fa-outdent', value: 'fa fa-outdent' },
{ text: 'fa-pagelines', value: 'fa fa-pagelines' },
{ text: 'fa-paper-plane', value: 'fa fa-paper-plane' },
{ text: 'fa-paper-plane-o', value: 'fa fa-paper-plane-o' },
{ text: 'fa-paperclip', value: 'fa fa-paperclip' },
{ text: 'fa-paragraph', value: 'fa fa-paragraph' },
{ text: 'fa-paste', value: 'fa fa-paste' },
{ text: 'fa-pause', value: 'fa fa-pause' },
{ text: 'fa-paw', value: 'fa fa-paw' },
{ text: 'fa-pencil', value: 'fa fa-pencil' },
{ text: 'fa-pencil-square', value: 'fa fa-pencil-square' },
{ text: 'fa-pencil-square-o', value: 'fa fa-pencil-square-o' },
{ text: 'fa-phone', value: 'fa fa-phone' },
{ text: 'fa-phone-square', value: 'fa fa-phone-square' },
{ text: 'fa-photo', value: 'fa fa-photo' },
{ text: 'fa-picture-o', value: 'fa fa-picture-o' },
{ text: 'fa-pied-piper', value: 'fa fa-pied-piper' },
{ text: 'fa-pied-piper-alt', value: 'fa fa-pied-piper-alt' },
{ text: 'fa-pied-piper-square', value: 'fa fa-pied-piper-square' },
{ text: 'fa-pinterest', value: 'fa fa-pinterest' },
{ text: 'fa-pinterest-square', value: 'fa fa-pinterest-square' },
{ text: 'fa-plane', value: 'fa fa-plane' },
{ text: 'fa-play', value: 'fa fa-play' },
{ text: 'fa-play-circle', value: 'fa fa-play-circle' },
{ text: 'fa-play-circle-o', value: 'fa fa-play-circle-o' },
{ text: 'fa-plus', value: 'fa fa-plus' },
{ text: 'fa-plus-circle', value: 'fa fa-plus-circle' },
{ text: 'fa-plus-square', value: 'fa fa-plus-square' },
{ text: 'fa-plus-square-o', value: 'fa fa-plus-square-o' },
{ text: 'fa-power-off', value: 'fa fa-power-off' },
{ text: 'fa-print', value: 'fa fa-print' },
{ text: 'fa-puzzle-piece', value: 'fa fa-puzzle-piece' },
{ text: 'fa-qq', value: 'fa fa-qq' },
{ text: 'fa-qrcode', value: 'fa fa-qrcode' },
{ text: 'fa-question', value: 'fa fa-question' },
{ text: 'fa-question-circle', value: 'fa fa-question-circle' },
{ text: 'fa-quote-left', value: 'fa fa-quote-left' },
{ text: 'fa-quote-right', value: 'fa fa-quote-right' },
{ text: 'fa-ra', value: 'fa fa-ra' },
{ text: 'fa-random', value: 'fa fa-random' },
{ text: 'fa-rebel', value: 'fa fa-rebel' },
{ text: 'fa-recycle', value: 'fa fa-recycle' },
{ text: 'fa-reddit', value: 'fa fa-reddit' },
{ text: 'fa-reddit-square', value: 'fa fa-reddit-square' },
{ text: 'fa-refresh', value: 'fa fa-refresh' },
{ text: 'fa-renren', value: 'fa fa-renren' },
{ text: 'fa-reorder', value: 'fa fa-reorder' },
{ text: 'fa-repeat', value: 'fa fa-repeat' },
{ text: 'fa-reply', value: 'fa fa-reply' },
{ text: 'fa-reply-all', value: 'fa fa-reply-all' },
{ text: 'fa-retweet', value: 'fa fa-retweet' },
{ text: 'fa-rmb', value: 'fa fa-rmb' },
{ text: 'fa-road', value: 'fa fa-road' },
{ text: 'fa-rocket', value: 'fa fa-rocket' },
{ text: 'fa-rotate-left', value: 'fa fa-rotate-left' },
{ text: 'fa-rotate-right', value: 'fa fa-rotate-right' },
{ text: 'fa-rouble', value: 'fa fa-rouble' },
{ text: 'fa-rss', value: 'fa fa-rss' },
{ text: 'fa-rss-square', value: 'fa fa-rss-square' },
{ text: 'fa-rub', value: 'fa fa-rub' },
{ text: 'fa-ruble', value: 'fa fa-ruble' },
{ text: 'fa-rupee', value: 'fa fa-rupee' },
{ text: 'fa-save', value: 'fa fa-save' },
{ text: 'fa-scissors', value: 'fa fa-scissors' },
{ text: 'fa-search', value: 'fa fa-search' },
{ text: 'fa-search-minus', value: 'fa fa-search-minus' },
{ text: 'fa-search-plus', value: 'fa fa-search-plus' },
{ text: 'fa-send', value: 'fa fa-send' },
{ text: 'fa-send-o', value: 'fa fa-send-o' },
{ text: 'fa-share', value: 'fa fa-share' },
{ text: 'fa-share-alt', value: 'fa fa-share-alt' },
{ text: 'fa-share-alt-square', value: 'fa fa-share-alt-square' },
{ text: 'fa-share-square', value: 'fa fa-share-square' },
{ text: 'fa-share-square-o', value: 'fa fa-share-square-o' },
{ text: 'fa-shield', value: 'fa fa-shield' },
{ text: 'fa-shopping-cart', value: 'fa fa-shopping-cart' },
{ text: 'fa-sign-in', value: 'fa fa-sign-in' },
{ text: 'fa-sign-out', value: 'fa fa-sign-out' },
{ text: 'fa-signal', value: 'fa fa-signal' },
{ text: 'fa-sitemap', value: 'fa fa-sitemap' },
{ text: 'fa-skype', value: 'fa fa-skype' },
{ text: 'fa-slack', value: 'fa fa-slack' },
{ text: 'fa-sliders', value: 'fa fa-sliders' },
{ text: 'fa-smile-o', value: 'fa fa-smile-o' },
{ text: 'fa-sort', value: 'fa fa-sort' },
{ text: 'fa-sort-alpha-asc', value: 'fa fa-sort-alpha-asc' },
{ text: 'fa-sort-alpha-desc', value: 'fa fa-sort-alpha-desc' },
{ text: 'fa-sort-amount-asc', value: 'fa fa-sort-amount-asc' },
{ text: 'fa-sort-amount-desc', value: 'fa fa-sort-amount-desc' },
{ text: 'fa-sort-asc', value: 'fa fa-sort-asc' },
{ text: 'fa-sort-desc', value: 'fa fa-sort-desc' },
{ text: 'fa-sort-down', value: 'fa fa-sort-down' },
{ text: 'fa-sort-numeric-asc', value: 'fa fa-sort-numeric-asc' },
{ text: 'fa-sort-numeric-desc', value: 'fa fa-sort-numeric-desc' },
{ text: 'fa-sort-up', value: 'fa fa-sort-up' },
{ text: 'fa-soundcloud', value: 'fa fa-soundcloud' },
{ text: 'fa-space-shuttle', value: 'fa fa-space-shuttle' },
{ text: 'fa-spinner', value: 'fa fa-spinner' },
{ text: 'fa-spoon', value: 'fa fa-spoon' },
{ text: 'fa-spotify', value: 'fa fa-spotify' },
{ text: 'fa-square', value: 'fa fa-square' },
{ text: 'fa-square-o', value: 'fa fa-square-o' },
{ text: 'fa-stack-exchange', value: 'fa fa-stack-exchange' },
{ text: 'fa-stack-overflow', value: 'fa fa-stack-overflow' },
{ text: 'fa-star', value: 'fa fa-star' },
{ text: 'fa-star-half', value: 'fa fa-star-half' },
{ text: 'fa-star-half-empty', value: 'fa fa-star-half-empty' },
{ text: 'fa-star-half-full', value: 'fa fa-star-half-full' },
{ text: 'fa-star-half-o', value: 'fa fa-star-half-o' },
{ text: 'fa-star-o', value: 'fa fa-star-o' },
{ text: 'fa-steam', value: 'fa fa-steam' },
{ text: 'fa-steam-square', value: 'fa fa-steam-square' },
{ text: 'fa-step-backward', value: 'fa fa-step-backward' },
{ text: 'fa-step-forward', value: 'fa fa-step-forward' },
{ text: 'fa-stethoscope', value: 'fa fa-stethoscope' },
{ text: 'fa-stop', value: 'fa fa-stop' },
{ text: 'fa-strikethrough', value: 'fa fa-strikethrough' },
{ text: 'fa-stumbleupon', value: 'fa fa-stumbleupon' },
{ text: 'fa-stumbleupon-circle', value: 'fa fa-stumbleupon-circle' },
{ text: 'fa-subscript', value: 'fa fa-subscript' },
{ text: 'fa-suitcase', value: 'fa fa-suitcase' },
{ text: 'fa-sun-o', value: 'fa fa-sun-o' },
{ text: 'fa-superscript', value: 'fa fa-superscript' },
{ text: 'fa-support', value: 'fa fa-support' },
{ text: 'fa-table', value: 'fa fa-table' },
{ text: 'fa-tablet', value: 'fa fa-tablet' },
{ text: 'fa-tachometer', value: 'fa fa-tachometer' },
{ text: 'fa-tag', value: 'fa fa-tag' },
{ text: 'fa-tags', value: 'fa fa-tags' },
{ text: 'fa-tasks', value: 'fa fa-tasks' },
{ text: 'fa-taxi', value: 'fa fa-taxi' },
{ text: 'fa-tencent-weibo', value: 'fa fa-tencent-weibo' },
{ text: 'fa-terminal', value: 'fa fa-terminal' },
{ text: 'fa-text-height', value: 'fa fa-text-height' },
{ text: 'fa-text-width', value: 'fa fa-text-width' },
{ text: 'fa-th', value: 'fa fa-th' },
{ text: 'fa-th-large', value: 'fa fa-th-large' },
{ text: 'fa-th-list', value: 'fa fa-th-list' },
{ text: 'fa-thumb-tack', value: 'fa fa-thumb-tack' },
{ text: 'fa-thumbs-down', value: 'fa fa-thumbs-down' },
{ text: 'fa-thumbs-o-down', value: 'fa fa-thumbs-o-down' },
{ text: 'fa-thumbs-o-up', value: 'fa fa-thumbs-o-up' },
{ text: 'fa-thumbs-up', value: 'fa fa-thumbs-up' },
{ text: 'fa-ticket', value: 'fa fa-ticket' },
{ text: 'fa-times', value: 'fa fa-times' },
{ text: 'fa-times-circle', value: 'fa fa-times-circle' },
{ text: 'fa-times-circle-o', value: 'fa fa-times-circle-o' },
{ text: 'fa-tint', value: 'fa fa-tint' },
{ text: 'fa-toggle-down', value: 'fa fa-toggle-down' },
{ text: 'fa-toggle-left', value: 'fa fa-toggle-left' },
{ text: 'fa-toggle-right', value: 'fa fa-toggle-right' },
{ text: 'fa-toggle-up', value: 'fa fa-toggle-up' },
{ text: 'fa-trash-o', value: 'fa fa-trash-o' },
{ text: 'fa-tree', value: 'fa fa-tree' },
{ text: 'fa-trello', value: 'fa fa-trello' },
{ text: 'fa-trophy', value: 'fa fa-trophy' },
{ text: 'fa-truck', value: 'fa fa-truck' },
{ text: 'fa-try', value: 'fa fa-try' },
{ text: 'fa-tumblr', value: 'fa fa-tumblr' },
{ text: 'fa-tumblr-square', value: 'fa fa-tumblr-square' },
{ text: 'fa-turkish-lira', value: 'fa fa-turkish-lira' },
{ text: 'fa-twitter', value: 'fa fa-twitter' },
{ text: 'fa-twitter-square', value: 'fa fa-twitter-square' },
{ text: 'fa-umbrella', value: 'fa fa-umbrella' },
{ text: 'fa-underline', value: 'fa fa-underline' },
{ text: 'fa-undo', value: 'fa fa-undo' },
{ text: 'fa-university', value: 'fa fa-university' },
{ text: 'fa-unlink', value: 'fa fa-unlink' },
{ text: 'fa-unlock', value: 'fa fa-unlock' },
{ text: 'fa-unlock-alt', value: 'fa fa-unlock-alt' },
{ text: 'fa-unsorted', value: 'fa fa-unsorted' },
{ text: 'fa-upload', value: 'fa fa-upload' },
{ text: 'fa-usd', value: 'fa fa-usd' },
{ text: 'fa-user', value: 'fa fa-user' },
{ text: 'fa-user-md', value: 'fa fa-user-md' },
{ text: 'fa-users', value: 'fa fa-users' },
{ text: 'fa-video-camera', value: 'fa fa-video-camera' },
{ text: 'fa-vimeo-square', value: 'fa fa-vimeo-square' },
{ text: 'fa-vine', value: 'fa fa-vine' },
{ text: 'fa-vk', value: 'fa fa-vk' },
{ text: 'fa-volume-down', value: 'fa fa-volume-down' },
{ text: 'fa-volume-off', value: 'fa fa-volume-off' },
{ text: 'fa-volume-up', value: 'fa fa-volume-up' },
{ text: 'fa-warning', value: 'fa fa-warning' },
{ text: 'fa-wechat', value: 'fa fa-wechat' },
{ text: 'fa-weibo', value: 'fa fa-weibo' },
{ text: 'fa-weixin', value: 'fa fa-weixin' },
{ text: 'fa-wheelchair', value: 'fa fa-wheelchair' },
{ text: 'fa-windows', value: 'fa fa-windows' },
{ text: 'fa-won', value: 'fa fa-won' },
{ text: 'fa-wordpress', value: 'fa fa-wordpress' },
{ text: 'fa-wrench', value: 'fa fa-wrench' },
{ text: 'fa-xing', value: 'fa fa-xing' },
{ text: 'fa-xing-square', value: 'fa fa-xing-square' },
{ text: 'fa-yahoo', value: 'fa fa-yahoo' },
{ text: 'fa-yen', value: 'fa fa-yen' },
{ text: 'fa-youtube', value: 'fa fa-youtube' },
{ text: 'fa-youtube-play', value: 'fa fa-youtube-play' },
{ text: 'fa-youtube-square', value: 'fa fa-youtube-square' }
    ];
    return icons_list;
}

function load_list_icons() {
    var list_icons = [
{ text: 'styled', value: 'list-styled' }, 
{ text: 'unstyled', value: 'list-unstyled' }, 
{ text: 'inline', value: 'list-inline' }, 
{ text: 'fa-adn', value: 'list-fa-adn' },
{ text: 'fa-align-center', value: 'list-fa-align-center' },
{ text: 'fa-align-justify', value: 'list-fa-align-justify' },
{ text: 'fa-align-left', value: 'list-fa-align-left' },
{ text: 'fa-align-right', value: 'list-fa-align-right' },
{ text: 'fa-ambulance', value: 'list-fa-ambulance' },
{ text: 'fa-anchor', value: 'list-fa-anchor' },
{ text: 'fa-android', value: 'list-fa-android' },
{ text: 'fa-angle-double-down', value: 'list-fa-angle-double-down' },
{ text: 'fa-angle-double-left', value: 'list-fa-angle-double-left' },
{ text: 'fa-angle-double-right', value: 'list-fa-angle-double-right' },
{ text: 'fa-angle-double-up', value: 'list-fa-angle-double-up' },
{ text: 'fa-angle-down', value: 'list-fa-angle-down' },
{ text: 'fa-angle-left', value: 'list-fa-angle-left' },
{ text: 'fa-angle-right', value: 'list-fa-angle-right' },
{ text: 'fa-angle-up', value: 'list-fa-angle-up' },
{ text: 'fa-apple', value: 'list-fa-apple' },
{ text: 'fa-archive', value: 'list-fa-archive' },
{ text: 'fa-arrow-circle-down', value: 'list-fa-arrow-circle-down' },
{ text: 'fa-arrow-circle-left', value: 'list-fa-arrow-circle-left' },
{ text: 'fa-arrow-circle-o-down', value: 'list-fa-arrow-circle-o-down' },
{ text: 'fa-arrow-circle-o-left', value: 'list-fa-arrow-circle-o-left' },
{ text: 'fa-arrow-circle-o-right', value: 'list-fa-arrow-circle-o-right' },
{ text: 'fa-arrow-circle-o-up', value: 'list-fa-arrow-circle-o-up' },
{ text: 'fa-arrow-circle-right', value: 'list-fa-arrow-circle-right' },
{ text: 'fa-arrow-circle-up', value: 'list-fa-arrow-circle-up' },
{ text: 'fa-arrow-down', value: 'list-fa-arrow-down' },
{ text: 'fa-arrow-left', value: 'list-fa-arrow-left' },
{ text: 'fa-arrow-right', value: 'list-fa-arrow-right' },
{ text: 'fa-arrow-up', value: 'list-fa-arrow-up' },
{ text: 'fa-arrows', value: 'list-fa-arrows' },
{ text: 'fa-arrows-alt', value: 'list-fa-arrows-alt' },
{ text: 'fa-arrows-h', value: 'list-fa-arrows-h' },
{ text: 'fa-arrows-v', value: 'list-fa-arrows-v' },
{ text: 'fa-asterisk', value: 'list-fa-asterisk' },
{ text: 'fa-automobile', value: 'list-fa-automobile' },
{ text: 'fa-backward', value: 'list-fa-backward' },
{ text: 'fa-ban', value: 'list-fa-ban' },
{ text: 'fa-bank', value: 'list-fa-bank' },
{ text: 'fa-bar-chart-o', value: 'list-fa-bar-chart-o' },
{ text: 'fa-barcode', value: 'list-fa-barcode' },
{ text: 'fa-bars', value: 'list-fa-bars' },
{ text: 'fa-beer', value: 'list-fa-beer' },
{ text: 'fa-behance', value: 'list-fa-behance' },
{ text: 'fa-behance-square', value: 'list-fa-behance-square' },
{ text: 'fa-bell', value: 'list-fa-bell' },
{ text: 'fa-bell-o', value: 'list-fa-bell-o' },
{ text: 'fa-bitbucket', value: 'list-fa-bitbucket' },
{ text: 'fa-bitbucket-square', value: 'list-fa-bitbucket-square' },
{ text: 'fa-bitcoin', value: 'list-fa-bitcoin' },
{ text: 'fa-bold', value: 'list-fa-bold' },
{ text: 'fa-bolt', value: 'list-fa-bolt' },
{ text: 'fa-bomb', value: 'list-fa-bomb' },
{ text: 'fa-book', value: 'list-fa-book' },
{ text: 'fa-bookmark', value: 'list-fa-bookmark' },
{ text: 'fa-bookmark-o', value: 'list-fa-bookmark-o' },
{ text: 'fa-briefcase', value: 'list-fa-briefcase' },
{ text: 'fa-btc', value: 'list-fa-btc' },
{ text: 'fa-bug', value: 'list-fa-bug' },
{ text: 'fa-building', value: 'list-fa-building' },
{ text: 'fa-building-o', value: 'list-fa-building-o' },
{ text: 'fa-bullhorn', value: 'list-fa-bullhorn' },
{ text: 'fa-bullseye', value: 'list-fa-bullseye' },
{ text: 'fa-cab', value: 'list-fa-cab' },
{ text: 'fa-calendar', value: 'list-fa-calendar' },
{ text: 'fa-calendar-o', value: 'list-fa-calendar-o' },
{ text: 'fa-camera', value: 'list-fa-camera' },
{ text: 'fa-camera-retro', value: 'list-fa-camera-retro' },
{ text: 'fa-car', value: 'list-fa-car' },
{ text: 'fa-caret-down', value: 'list-fa-caret-down' },
{ text: 'fa-caret-left', value: 'list-fa-caret-left' },
{ text: 'fa-caret-right', value: 'list-fa-caret-right' },
{ text: 'fa-caret-square-o-down', value: 'list-fa-caret-square-o-down' },
{ text: 'fa-caret-square-o-left', value: 'list-fa-caret-square-o-left' },
{ text: 'fa-caret-square-o-right', value: 'list-fa-caret-square-o-right' },
{ text: 'fa-caret-square-o-up', value: 'list-fa-caret-square-o-up' },
{ text: 'fa-caret-up', value: 'list-fa-caret-up' },
{ text: 'fa-certificate', value: 'list-fa-certificate' },
{ text: 'fa-chain', value: 'list-fa-chain' },
{ text: 'fa-chain-broken', value: 'list-fa-chain-broken' },
{ text: 'fa-check', value: 'list-fa-check' },
{ text: 'fa-check-circle', value: 'list-fa-check-circle' },
{ text: 'fa-check-circle-o', value: 'list-fa-check-circle-o' },
{ text: 'fa-check-square', value: 'list-fa-check-square' },
{ text: 'fa-check-square-o', value: 'list-fa-check-square-o' },
{ text: 'fa-chevron-circle-down', value: 'list-fa-chevron-circle-down' },
{ text: 'fa-chevron-circle-left', value: 'list-fa-chevron-circle-left' },
{ text: 'fa-chevron-circle-right', value: 'list-fa-chevron-circle-right' },
{ text: 'fa-chevron-circle-up', value: 'list-fa-chevron-circle-up' },
{ text: 'fa-chevron-down', value: 'list-fa-chevron-down' },
{ text: 'fa-chevron-left', value: 'list-fa-chevron-left' },
{ text: 'fa-chevron-right', value: 'list-fa-chevron-right' },
{ text: 'fa-chevron-up', value: 'list-fa-chevron-up' },
{ text: 'fa-child', value: 'list-fa-child' },
{ text: 'fa-circle', value: 'list-fa-circle' },
{ text: 'fa-circle-o', value: 'list-fa-circle-o' },
{ text: 'fa-circle-o-notch', value: 'list-fa-circle-o-notch' },
{ text: 'fa-circle-thin', value: 'list-fa-circle-thin' },
{ text: 'fa-clipboard', value: 'list-fa-clipboard' },
{ text: 'fa-clock-o', value: 'list-fa-clock-o' },
{ text: 'fa-cloud', value: 'list-fa-cloud' },
{ text: 'fa-cloud-download', value: 'list-fa-cloud-download' },
{ text: 'fa-cloud-upload', value: 'list-fa-cloud-upload' },
{ text: 'fa-cny', value: 'list-fa-cny' },
{ text: 'fa-code', value: 'list-fa-code' },
{ text: 'fa-code-fork', value: 'list-fa-code-fork' },
{ text: 'fa-codepen', value: 'list-fa-codepen' },
{ text: 'fa-coffee', value: 'list-fa-coffee' },
{ text: 'fa-cog', value: 'list-fa-cog' },
{ text: 'fa-cogs', value: 'list-fa-cogs' },
{ text: 'fa-columns', value: 'list-fa-columns' },
{ text: 'fa-comment', value: 'list-fa-comment' },
{ text: 'fa-comment-o', value: 'list-fa-comment-o' },
{ text: 'fa-comments', value: 'list-fa-comments' },
{ text: 'fa-comments-o', value: 'list-fa-comments-o' },
{ text: 'fa-compass', value: 'list-fa-compass' },
{ text: 'fa-compress', value: 'list-fa-compress' },
{ text: 'fa-copy', value: 'list-fa-copy' },
{ text: 'fa-credit-card', value: 'list-fa-credit-card' },
{ text: 'fa-crop', value: 'list-fa-crop' },
{ text: 'fa-crosshairs', value: 'list-fa-crosshairs' },
{ text: 'fa-css3', value: 'list-fa-css3' },
{ text: 'fa-cube', value: 'list-fa-cube' },
{ text: 'fa-cubes', value: 'list-fa-cubes' },
{ text: 'fa-cut', value: 'list-fa-cut' },
{ text: 'fa-cutlery', value: 'list-fa-cutlery' },
{ text: 'fa-dashboard', value: 'list-fa-dashboard' },
{ text: 'fa-database', value: 'list-fa-database' },
{ text: 'fa-dedent', value: 'list-fa-dedent' },
{ text: 'fa-delicious', value: 'list-fa-delicious' },
{ text: 'fa-desktop', value: 'list-fa-desktop' },
{ text: 'fa-deviantart', value: 'list-fa-deviantart' },
{ text: 'fa-digg', value: 'list-fa-digg' },
{ text: 'fa-dollar', value: 'list-fa-dollar' },
{ text: 'fa-dot-circle-o', value: 'list-fa-dot-circle-o' },
{ text: 'fa-download', value: 'list-fa-download' },
{ text: 'fa-dribbble', value: 'list-fa-dribbble' },
{ text: 'fa-dropbox', value: 'list-fa-dropbox' },
{ text: 'fa-drupal', value: 'list-fa-drupal' },
{ text: 'fa-edit', value: 'list-fa-edit' },
{ text: 'fa-eject', value: 'list-fa-eject' },
{ text: 'fa-ellipsis-h', value: 'list-fa-ellipsis-h' },
{ text: 'fa-ellipsis-v', value: 'list-fa-ellipsis-v' },
{ text: 'fa-empire', value: 'list-fa-empire' },
{ text: 'fa-envelope', value: 'list-fa-envelope' },
{ text: 'fa-envelope-o', value: 'list-fa-envelope-o' },
{ text: 'fa-envelope-square', value: 'list-fa-envelope-square' },
{ text: 'fa-eraser', value: 'list-fa-eraser' },
{ text: 'fa-eur', value: 'list-fa-eur' },
{ text: 'fa-euro', value: 'list-fa-euro' },
{ text: 'fa-exchange', value: 'list-fa-exchange' },
{ text: 'fa-exclamation', value: 'list-fa-exclamation' },
{ text: 'fa-exclamation-circle', value: 'list-fa-exclamation-circle' },
{ text: 'fa-exclamation-triangle', value: 'list-fa-exclamation-triangle' },
{ text: 'fa-expand', value: 'list-fa-expand' },
{ text: 'fa-external-link', value: 'list-fa-external-link' },
{ text: 'fa-external-link-square', value: 'list-fa-external-link-square' },
{ text: 'fa-eye', value: 'list-fa-eye' },
{ text: 'fa-eye-slash', value: 'list-fa-eye-slash' },
{ text: 'fa-facebook', value: 'list-fa-facebook' },
{ text: 'fa-facebook-square', value: 'list-fa-facebook-square' },
{ text: 'fa-fast-backward', value: 'list-fa-fast-backward' },
{ text: 'fa-fast-forward', value: 'list-fa-fast-forward' },
{ text: 'fa-fax', value: 'list-fa-fax' },
{ text: 'fa-female', value: 'list-fa-female' },
{ text: 'fa-fighter-jet', value: 'list-fa-fighter-jet' },
{ text: 'fa-file', value: 'list-fa-file' },
{ text: 'fa-file-archive-o', value: 'list-fa-file-archive-o' },
{ text: 'fa-file-audio-o', value: 'list-fa-file-audio-o' },
{ text: 'fa-file-code-o', value: 'list-fa-file-code-o' },
{ text: 'fa-file-excel-o', value: 'list-fa-file-excel-o' },
{ text: 'fa-file-image-o', value: 'list-fa-file-image-o' },
{ text: 'fa-file-movie-o', value: 'list-fa-file-movie-o' },
{ text: 'fa-file-o', value: 'list-fa-file-o' },
{ text: 'fa-file-pdf-o', value: 'list-fa-file-pdf-o' },
{ text: 'fa-file-photo-o', value: 'list-fa-file-photo-o' },
{ text: 'fa-file-picture-o', value: 'list-fa-file-picture-o' },
{ text: 'fa-file-powerpoint-o', value: 'list-fa-file-powerpoint-o' },
{ text: 'fa-file-sound-o', value: 'list-fa-file-sound-o' },
{ text: 'fa-file-text', value: 'list-fa-file-text' },
{ text: 'fa-file-text-o', value: 'list-fa-file-text-o' },
{ text: 'fa-file-video-o', value: 'list-fa-file-video-o' },
{ text: 'fa-file-word-o', value: 'list-fa-file-word-o' },
{ text: 'fa-file-zip-o', value: 'list-fa-file-zip-o' },
{ text: 'fa-files-o', value: 'list-fa-files-o' },
{ text: 'fa-film', value: 'list-fa-film' },
{ text: 'fa-filter', value: 'list-fa-filter' },
{ text: 'fa-fire', value: 'list-fa-fire' },
{ text: 'fa-fire-extinguisher', value: 'list-fa-fire-extinguisher' },
{ text: 'fa-flag', value: 'list-fa-flag' },
{ text: 'fa-flag-checkered', value: 'list-fa-flag-checkered' },
{ text: 'fa-flag-o', value: 'list-fa-flag-o' },
{ text: 'fa-flash', value: 'list-fa-flash' },
{ text: 'fa-flask', value: 'list-fa-flask' },
{ text: 'fa-flickr', value: 'list-fa-flickr' },
{ text: 'fa-floppy-o', value: 'list-fa-floppy-o' },
{ text: 'fa-folder', value: 'list-fa-folder' },
{ text: 'fa-folder-o', value: 'list-fa-folder-o' },
{ text: 'fa-folder-open', value: 'list-fa-folder-open' },
{ text: 'fa-folder-open-o', value: 'list-fa-folder-open-o' },
{ text: 'fa-font', value: 'list-fa-font' },
{ text: 'fa-forward', value: 'list-fa-forward' },
{ text: 'fa-foursquare', value: 'list-fa-foursquare' },
{ text: 'fa-frown-o', value: 'list-fa-frown-o' },
{ text: 'fa-gamepad', value: 'list-fa-gamepad' },
{ text: 'fa-gavel', value: 'list-fa-gavel' },
{ text: 'fa-gbp', value: 'list-fa-gbp' },
{ text: 'fa-ge', value: 'list-fa-ge' },
{ text: 'fa-gear', value: 'list-fa-gear' },
{ text: 'fa-gears', value: 'list-fa-gears' },
{ text: 'fa-gift', value: 'list-fa-gift' },
{ text: 'fa-git', value: 'list-fa-git' },
{ text: 'fa-git-square', value: 'list-fa-git-square' },
{ text: 'fa-github', value: 'list-fa-github' },
{ text: 'fa-github-alt', value: 'list-fa-github-alt' },
{ text: 'fa-github-square', value: 'list-fa-github-square' },
{ text: 'fa-gittip', value: 'list-fa-gittip' },
{ text: 'fa-glass', value: 'list-fa-glass' },
{ text: 'fa-globe', value: 'list-fa-globe' },
{ text: 'fa-google', value: 'list-fa-google' },
{ text: 'fa-google-plus', value: 'list-fa-google-plus' },
{ text: 'fa-google-plus-square', value: 'list-fa-google-plus-square' },
{ text: 'fa-graduation-cap', value: 'list-fa-graduation-cap' },
{ text: 'fa-group', value: 'list-fa-group' },
{ text: 'fa-h-square', value: 'list-fa-h-square' },
{ text: 'fa-hacker-news', value: 'list-fa-hacker-news' },
{ text: 'fa-hand-o-down', value: 'list-fa-hand-o-down' },
{ text: 'fa-hand-o-left', value: 'list-fa-hand-o-left' },
{ text: 'fa-hand-o-right', value: 'list-fa-hand-o-right' },
{ text: 'fa-hand-o-up', value: 'list-fa-hand-o-up' },
{ text: 'fa-hdd-o', value: 'list-fa-hdd-o' },
{ text: 'fa-header', value: 'list-fa-header' },
{ text: 'fa-headphones', value: 'list-fa-headphones' },
{ text: 'fa-heart', value: 'list-fa-heart' },
{ text: 'fa-heart-o', value: 'list-fa-heart-o' },
{ text: 'fa-history', value: 'list-fa-history' },
{ text: 'fa-home', value: 'list-fa-home' },
{ text: 'fa-hospital-o', value: 'list-fa-hospital-o' },
{ text: 'fa-html5', value: 'list-fa-html5' },
{ text: 'fa-image', value: 'list-fa-image' },
{ text: 'fa-inbox', value: 'list-fa-inbox' },
{ text: 'fa-indent', value: 'list-fa-indent' },
{ text: 'fa-info', value: 'list-fa-info' },
{ text: 'fa-info-circle', value: 'list-fa-info-circle' },
{ text: 'fa-inr', value: 'list-fa-inr' },
{ text: 'fa-instagram', value: 'list-fa-instagram' },
{ text: 'fa-institution', value: 'list-fa-institution' },
{ text: 'fa-italic', value: 'list-fa-italic' },
{ text: 'fa-joomla', value: 'list-fa-joomla' },
{ text: 'fa-jpy', value: 'list-fa-jpy' },
{ text: 'fa-jsfiddle', value: 'list-fa-jsfiddle' },
{ text: 'fa-key', value: 'list-fa-key' },
{ text: 'fa-keyboard-o', value: 'list-fa-keyboard-o' },
{ text: 'fa-krw', value: 'list-fa-krw' },
{ text: 'fa-language', value: 'list-fa-language' },
{ text: 'fa-laptop', value: 'list-fa-laptop' },
{ text: 'fa-leaf', value: 'list-fa-leaf' },
{ text: 'fa-legal', value: 'list-fa-legal' },
{ text: 'fa-lemon-o', value: 'list-fa-lemon-o' },
{ text: 'fa-level-down', value: 'list-fa-level-down' },
{ text: 'fa-level-up', value: 'list-fa-level-up' },
{ text: 'fa-life-bouy', value: 'list-fa-life-bouy' },
{ text: 'fa-life-ring', value: 'list-fa-life-ring' },
{ text: 'fa-life-saver', value: 'list-fa-life-saver' },
{ text: 'fa-lightbulb-o', value: 'list-fa-lightbulb-o' },
{ text: 'fa-link', value: 'list-fa-link' },
{ text: 'fa-linkedin', value: 'list-fa-linkedin' },
{ text: 'fa-linkedin-square', value: 'list-fa-linkedin-square' },
{ text: 'fa-linux', value: 'list-fa-linux' },
{ text: 'fa-list', value: 'list-fa-list' },
{ text: 'fa-list-alt', value: 'list-fa-list-alt' },
{ text: 'fa-list-ol', value: 'list-fa-list-ol' },
{ text: 'fa-list-ul', value: 'list-fa-list-ul' },
{ text: 'fa-location-arrow', value: 'list-fa-location-arrow' },
{ text: 'fa-lock', value: 'list-fa-lock' },
{ text: 'fa-long-arrow-down', value: 'list-fa-long-arrow-down' },
{ text: 'fa-long-arrow-left', value: 'list-fa-long-arrow-left' },
{ text: 'fa-long-arrow-right', value: 'list-fa-long-arrow-right' },
{ text: 'fa-long-arrow-up', value: 'list-fa-long-arrow-up' },
{ text: 'fa-magic', value: 'list-fa-magic' },
{ text: 'fa-magnet', value: 'list-fa-magnet' },
{ text: 'fa-mail-forward', value: 'list-fa-mail-forward' },
{ text: 'fa-mail-reply', value: 'list-fa-mail-reply' },
{ text: 'fa-mail-reply-all', value: 'list-fa-mail-reply-all' },
{ text: 'fa-male', value: 'list-fa-male' },
{ text: 'fa-map-marker', value: 'list-fa-map-marker' },
{ text: 'fa-maxcdn', value: 'list-fa-maxcdn' },
{ text: 'fa-medkit', value: 'list-fa-medkit' },
{ text: 'fa-meh-o', value: 'list-fa-meh-o' },
{ text: 'fa-microphone', value: 'list-fa-microphone' },
{ text: 'fa-microphone-slash', value: 'list-fa-microphone-slash' },
{ text: 'fa-minus', value: 'list-fa-minus' },
{ text: 'fa-minus-circle', value: 'list-fa-minus-circle' },
{ text: 'fa-minus-square', value: 'list-fa-minus-square' },
{ text: 'fa-minus-square-o', value: 'list-fa-minus-square-o' },
{ text: 'fa-mobile', value: 'list-fa-mobile' },
{ text: 'fa-mobile-phone', value: 'list-fa-mobile-phone' },
{ text: 'fa-money', value: 'list-fa-money' },
{ text: 'fa-moon-o', value: 'list-fa-moon-o' },
{ text: 'fa-mortar-board', value: 'list-fa-mortar-board' },
{ text: 'fa-music', value: 'list-fa-music' },
{ text: 'fa-navicon', value: 'list-fa-navicon' },
{ text: 'fa-openid', value: 'list-fa-openid' },
{ text: 'fa-outdent', value: 'list-fa-outdent' },
{ text: 'fa-pagelines', value: 'list-fa-pagelines' },
{ text: 'fa-paper-plane', value: 'list-fa-paper-plane' },
{ text: 'fa-paper-plane-o', value: 'list-fa-paper-plane-o' },
{ text: 'fa-paperclip', value: 'list-fa-paperclip' },
{ text: 'fa-paragraph', value: 'list-fa-paragraph' },
{ text: 'fa-paste', value: 'list-fa-paste' },
{ text: 'fa-pause', value: 'list-fa-pause' },
{ text: 'fa-paw', value: 'list-fa-paw' },
{ text: 'fa-pencil', value: 'list-fa-pencil' },
{ text: 'fa-pencil-square', value: 'list-fa-pencil-square' },
{ text: 'fa-pencil-square-o', value: 'list-fa-pencil-square-o' },
{ text: 'fa-phone', value: 'list-fa-phone' },
{ text: 'fa-phone-square', value: 'list-fa-phone-square' },
{ text: 'fa-photo', value: 'list-fa-photo' },
{ text: 'fa-picture-o', value: 'list-fa-picture-o' },
{ text: 'fa-pied-piper', value: 'list-fa-pied-piper' },
{ text: 'fa-pied-piper-alt', value: 'list-fa-pied-piper-alt' },
{ text: 'fa-pied-piper-square', value: 'list-fa-pied-piper-square' },
{ text: 'fa-pinterest', value: 'list-fa-pinterest' },
{ text: 'fa-pinterest-square', value: 'list-fa-pinterest-square' },
{ text: 'fa-plane', value: 'list-fa-plane' },
{ text: 'fa-play', value: 'list-fa-play' },
{ text: 'fa-play-circle', value: 'list-fa-play-circle' },
{ text: 'fa-play-circle-o', value: 'list-fa-play-circle-o' },
{ text: 'fa-plus', value: 'list-fa-plus' },
{ text: 'fa-plus-circle', value: 'list-fa-plus-circle' },
{ text: 'fa-plus-square', value: 'list-fa-plus-square' },
{ text: 'fa-plus-square-o', value: 'list-fa-plus-square-o' },
{ text: 'fa-power-off', value: 'list-fa-power-off' },
{ text: 'fa-print', value: 'list-fa-print' },
{ text: 'fa-puzzle-piece', value: 'list-fa-puzzle-piece' },
{ text: 'fa-qq', value: 'list-fa-qq' },
{ text: 'fa-qrcode', value: 'list-fa-qrcode' },
{ text: 'fa-question', value: 'list-fa-question' },
{ text: 'fa-question-circle', value: 'list-fa-question-circle' },
{ text: 'fa-quote-left', value: 'list-fa-quote-left' },
{ text: 'fa-quote-right', value: 'list-fa-quote-right' },
{ text: 'fa-ra', value: 'list-fa-ra' },
{ text: 'fa-random', value: 'list-fa-random' },
{ text: 'fa-rebel', value: 'list-fa-rebel' },
{ text: 'fa-recycle', value: 'list-fa-recycle' },
{ text: 'fa-reddit', value: 'list-fa-reddit' },
{ text: 'fa-reddit-square', value: 'list-fa-reddit-square' },
{ text: 'fa-refresh', value: 'list-fa-refresh' },
{ text: 'fa-renren', value: 'list-fa-renren' },
{ text: 'fa-reorder', value: 'list-fa-reorder' },
{ text: 'fa-repeat', value: 'list-fa-repeat' },
{ text: 'fa-reply', value: 'list-fa-reply' },
{ text: 'fa-reply-all', value: 'list-fa-reply-all' },
{ text: 'fa-retweet', value: 'list-fa-retweet' },
{ text: 'fa-rmb', value: 'list-fa-rmb' },
{ text: 'fa-road', value: 'list-fa-road' },
{ text: 'fa-rocket', value: 'list-fa-rocket' },
{ text: 'fa-rotate-left', value: 'list-fa-rotate-left' },
{ text: 'fa-rotate-right', value: 'list-fa-rotate-right' },
{ text: 'fa-rouble', value: 'list-fa-rouble' },
{ text: 'fa-rss', value: 'list-fa-rss' },
{ text: 'fa-rss-square', value: 'list-fa-rss-square' },
{ text: 'fa-rub', value: 'list-fa-rub' },
{ text: 'fa-ruble', value: 'list-fa-ruble' },
{ text: 'fa-rupee', value: 'list-fa-rupee' },
{ text: 'fa-save', value: 'list-fa-save' },
{ text: 'fa-scissors', value: 'list-fa-scissors' },
{ text: 'fa-search', value: 'list-fa-search' },
{ text: 'fa-search-minus', value: 'list-fa-search-minus' },
{ text: 'fa-search-plus', value: 'list-fa-search-plus' },
{ text: 'fa-send', value: 'list-fa-send' },
{ text: 'fa-send-o', value: 'list-fa-send-o' },
{ text: 'fa-share', value: 'list-fa-share' },
{ text: 'fa-share-alt', value: 'list-fa-share-alt' },
{ text: 'fa-share-alt-square', value: 'list-fa-share-alt-square' },
{ text: 'fa-share-square', value: 'list-fa-share-square' },
{ text: 'fa-share-square-o', value: 'list-fa-share-square-o' },
{ text: 'fa-shield', value: 'list-fa-shield' },
{ text: 'fa-shopping-cart', value: 'list-fa-shopping-cart' },
{ text: 'fa-sign-in', value: 'list-fa-sign-in' },
{ text: 'fa-sign-out', value: 'list-fa-sign-out' },
{ text: 'fa-signal', value: 'list-fa-signal' },
{ text: 'fa-sitemap', value: 'list-fa-sitemap' },
{ text: 'fa-skype', value: 'list-fa-skype' },
{ text: 'fa-slack', value: 'list-fa-slack' },
{ text: 'fa-sliders', value: 'list-fa-sliders' },
{ text: 'fa-smile-o', value: 'list-fa-smile-o' },
{ text: 'fa-sort', value: 'list-fa-sort' },
{ text: 'fa-sort-alpha-asc', value: 'list-fa-sort-alpha-asc' },
{ text: 'fa-sort-alpha-desc', value: 'list-fa-sort-alpha-desc' },
{ text: 'fa-sort-amount-asc', value: 'list-fa-sort-amount-asc' },
{ text: 'fa-sort-amount-desc', value: 'list-fa-sort-amount-desc' },
{ text: 'fa-sort-asc', value: 'list-fa-sort-asc' },
{ text: 'fa-sort-desc', value: 'list-fa-sort-desc' },
{ text: 'fa-sort-down', value: 'list-fa-sort-down' },
{ text: 'fa-sort-numeric-asc', value: 'list-fa-sort-numeric-asc' },
{ text: 'fa-sort-numeric-desc', value: 'list-fa-sort-numeric-desc' },
{ text: 'fa-sort-up', value: 'list-fa-sort-up' },
{ text: 'fa-soundcloud', value: 'list-fa-soundcloud' },
{ text: 'fa-space-shuttle', value: 'list-fa-space-shuttle' },
{ text: 'fa-spinner', value: 'list-fa-spinner' },
{ text: 'fa-spoon', value: 'list-fa-spoon' },
{ text: 'fa-spotify', value: 'list-fa-spotify' },
{ text: 'fa-square', value: 'list-fa-square' },
{ text: 'fa-square-o', value: 'list-fa-square-o' },
{ text: 'fa-stack-exchange', value: 'list-fa-stack-exchange' },
{ text: 'fa-stack-overflow', value: 'list-fa-stack-overflow' },
{ text: 'fa-star', value: 'list-fa-star' },
{ text: 'fa-star-half', value: 'list-fa-star-half' },
{ text: 'fa-star-half-empty', value: 'list-fa-star-half-empty' },
{ text: 'fa-star-half-full', value: 'list-fa-star-half-full' },
{ text: 'fa-star-half-o', value: 'list-fa-star-half-o' },
{ text: 'fa-star-o', value: 'list-fa-star-o' },
{ text: 'fa-steam', value: 'list-fa-steam' },
{ text: 'fa-steam-square', value: 'list-fa-steam-square' },
{ text: 'fa-step-backward', value: 'list-fa-step-backward' },
{ text: 'fa-step-forward', value: 'list-fa-step-forward' },
{ text: 'fa-stethoscope', value: 'list-fa-stethoscope' },
{ text: 'fa-stop', value: 'list-fa-stop' },
{ text: 'fa-strikethrough', value: 'list-fa-strikethrough' },
{ text: 'fa-stumbleupon', value: 'list-fa-stumbleupon' },
{ text: 'fa-stumbleupon-circle', value: 'list-fa-stumbleupon-circle' },
{ text: 'fa-subscript', value: 'list-fa-subscript' },
{ text: 'fa-suitcase', value: 'list-fa-suitcase' },
{ text: 'fa-sun-o', value: 'list-fa-sun-o' },
{ text: 'fa-superscript', value: 'list-fa-superscript' },
{ text: 'fa-support', value: 'list-fa-support' },
{ text: 'fa-table', value: 'list-fa-table' },
{ text: 'fa-tablet', value: 'list-fa-tablet' },
{ text: 'fa-tachometer', value: 'list-fa-tachometer' },
{ text: 'fa-tag', value: 'list-fa-tag' },
{ text: 'fa-tags', value: 'list-fa-tags' },
{ text: 'fa-tasks', value: 'list-fa-tasks' },
{ text: 'fa-taxi', value: 'list-fa-taxi' },
{ text: 'fa-tencent-weibo', value: 'list-fa-tencent-weibo' },
{ text: 'fa-terminal', value: 'list-fa-terminal' },
{ text: 'fa-text-height', value: 'list-fa-text-height' },
{ text: 'fa-text-width', value: 'list-fa-text-width' },
{ text: 'fa-th', value: 'list-fa-th' },
{ text: 'fa-th-large', value: 'list-fa-th-large' },
{ text: 'fa-th-list', value: 'list-fa-th-list' },
{ text: 'fa-thumb-tack', value: 'list-fa-thumb-tack' },
{ text: 'fa-thumbs-down', value: 'list-fa-thumbs-down' },
{ text: 'fa-thumbs-o-down', value: 'list-fa-thumbs-o-down' },
{ text: 'fa-thumbs-o-up', value: 'list-fa-thumbs-o-up' },
{ text: 'fa-thumbs-up', value: 'list-fa-thumbs-up' },
{ text: 'fa-ticket', value: 'list-fa-ticket' },
{ text: 'fa-times', value: 'list-fa-times' },
{ text: 'fa-times-circle', value: 'list-fa-times-circle' },
{ text: 'fa-times-circle-o', value: 'list-fa-times-circle-o' },
{ text: 'fa-tint', value: 'list-fa-tint' },
{ text: 'fa-toggle-down', value: 'list-fa-toggle-down' },
{ text: 'fa-toggle-left', value: 'list-fa-toggle-left' },
{ text: 'fa-toggle-right', value: 'list-fa-toggle-right' },
{ text: 'fa-toggle-up', value: 'list-fa-toggle-up' },
{ text: 'fa-trash-o', value: 'list-fa-trash-o' },
{ text: 'fa-tree', value: 'list-fa-tree' },
{ text: 'fa-trello', value: 'list-fa-trello' },
{ text: 'fa-trophy', value: 'list-fa-trophy' },
{ text: 'fa-truck', value: 'list-fa-truck' },
{ text: 'fa-try', value: 'list-fa-try' },
{ text: 'fa-tumblr', value: 'list-fa-tumblr' },
{ text: 'fa-tumblr-square', value: 'list-fa-tumblr-square' },
{ text: 'fa-turkish-lira', value: 'list-fa-turkish-lira' },
{ text: 'fa-twitter', value: 'list-fa-twitter' },
{ text: 'fa-twitter-square', value: 'list-fa-twitter-square' },
{ text: 'fa-umbrella', value: 'list-fa-umbrella' },
{ text: 'fa-underline', value: 'list-fa-underline' },
{ text: 'fa-undo', value: 'list-fa-undo' },
{ text: 'fa-university', value: 'list-fa-university' },
{ text: 'fa-unlink', value: 'list-fa-unlink' },
{ text: 'fa-unlock', value: 'list-fa-unlock' },
{ text: 'fa-unlock-alt', value: 'list-fa-unlock-alt' },
{ text: 'fa-unsorted', value: 'list-fa-unsorted' },
{ text: 'fa-upload', value: 'list-fa-upload' },
{ text: 'fa-usd', value: 'list-fa-usd' },
{ text: 'fa-user', value: 'list-fa-user' },
{ text: 'fa-user-md', value: 'list-fa-user-md' },
{ text: 'fa-users', value: 'list-fa-users' },
{ text: 'fa-video-camera', value: 'list-fa-video-camera' },
{ text: 'fa-vimeo-square', value: 'list-fa-vimeo-square' },
{ text: 'fa-vine', value: 'list-fa-vine' },
{ text: 'fa-vk', value: 'list-fa-vk' },
{ text: 'fa-volume-down', value: 'list-fa-volume-down' },
{ text: 'fa-volume-off', value: 'list-fa-volume-off' },
{ text: 'fa-volume-up', value: 'list-fa-volume-up' },
{ text: 'fa-warning', value: 'list-fa-warning' },
{ text: 'fa-wechat', value: 'list-fa-wechat' },
{ text: 'fa-weibo', value: 'list-fa-weibo' },
{ text: 'fa-weixin', value: 'list-fa-weixin' },
{ text: 'fa-wheelchair', value: 'list-fa-wheelchair' },
{ text: 'fa-windows', value: 'list-fa-windows' },
{ text: 'fa-won', value: 'list-fa-won' },
{ text: 'fa-wordpress', value: 'list-fa-wordpress' },
{ text: 'fa-wrench', value: 'list-fa-wrench' },
{ text: 'fa-xing', value: 'list-fa-xing' },
{ text: 'fa-xing-square', value: 'list-fa-xing-square' },
{ text: 'fa-yahoo', value: 'list-fa-yahoo' },
{ text: 'fa-yen', value: 'list-fa-yen' },
{ text: 'fa-youtube', value: 'list-fa-youtube' },
{ text: 'fa-youtube-play', value: 'list-fa-youtube-play' },
{ text: 'fa-youtube-square', value: 'list-fa-youtube-square' }
    ];

return list_icons;
}