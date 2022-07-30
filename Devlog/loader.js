jQuery(function ($) { // use jQuery code inside this to avoid "$ is not defined" error
   $('#load1').click(() => post(1))
   $('#load2').click(() => post(2))
   $('#load3').click(() => post(3))

   function post(part) {
      var data = {
         'action': 'load',
         'query': part == 1 ? args.query1 : (part == 2 ? args.query2 : args.query3), // Get params from wp_localize_script()
         'category': part == 1 ? args.category1 : (part == 2 ? args.category2 : args.category3),
         'page': part == 1 ? args.thisPage1 : (part == 2 ? args.thisPage2 : args.thisPage3)
      },
         button = part == 1 ? $('#load1') : (part == 2 ? $('#load2') : $('#load3'));

      $.post({
         url: args.ajaxURL,
         data: data,
         type: 'POST',
         /*beforeSend: function (xhr) {
            button.text('Loading...') // change the button text / add a preloader image
         },*/
         success: function (data) {
            if (data) {
               button.prev().after(data) // insert new posts [add button.text('Continue . . .')]
               if (part == 1) {
                  args.thisPage1++
                  if (args.thisPage1 == args.maxPage1) button.remove() // remove button if last page
               } else if (part == 2) {
                  args.thisPage2++
                  if (args.thisPage2 == args.maxPage2) button.remove()
               } else {
                  args.thisPage3++
                  if (args.thisPage3 == args.maxPage3) button.remove()
               }
            } else {
               button.remove()
            }
            addClickEvents()
         }
      })
   }
})