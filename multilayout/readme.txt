'Road Map' and testing for Multilayout theme


1. Theme to include multiple layout choices, to work accurately with IE7+, to support RTL languages, to include additional 'sideblock' regions

2. Using base theme as a parent - excluding pagelayout.css

3. Construct main 3colHG layout style using MJT's page layout files
        Tested FF5/6, Tested IE9, Tested IE7                    All good
        
4. Add hebrew language pack to test RTL language
        Tested FF5/6, Tested IE9, Tested IE7                    All good
                   
6. Adjust numbers in layout file to reduce padding              Done

7. Add additional layouts and pagelayout css for 3colBlog, 2colLeft, 2ColRight and Fullpage layouts
        Tested FF5/6, Tested IE9, Tested IE7                    All good
        Tested RTL - as above browsers                          All good
        
8. Add additional block regions above and below main content    Done


    This theme has minimal styling beyond that of Base and concentrates specifically on the layout of the theme, providing multiple layout options to function in IE7+ and in both LTR and RTL language layouts. It is intended to build on this basic theme to provide options with settings and styles/colours by using this theme as a parent.
    
    The page layouts and associated css are taken from Matthew James Taylor's Stacked Columns layout page and modified to fit with known Moodle requirements (#page-header/#page-footer/.region-content etc.) http://matthewjamestaylor.com/blog/perfect-stacked-columns.htm
    
    
