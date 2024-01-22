// alert('hello from the new js file');

//wp-blocks dependency in php will load after the blocks have been bootstrapped
//wp has wp property to the window obj
wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
    title: "Are You Paying Attention",
    icon: "smiley",
    category: "common",
    //what you see in the admin post editor screen
    edit: () => {
        //uses js to show what admin should see
        return wp.element.createElement('h3',null,'Hello, this is from the admin editor screen');
    },
    //public will see in content
    save: () => {
        //once updated and saved into the database
        return wp.element.createElement('h3',null,'This is the frontend');
    }
});

