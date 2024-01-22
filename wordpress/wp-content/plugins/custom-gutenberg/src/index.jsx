// alert('hello from the new js file');

//wp-blocks dependency in php will load after the blocks have been bootstrapped
//wp has wp property to the window obj
wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
    title: "Are You Paying Attention",
    icon: "smiley",
    category: "common",
    attributes: {
        skyColor: {type: "string"},
        grassColor: {type: "string"}
    },
    //what you see in the admin post editor screen
    edit: (props) => {
        //uses js to show what admin should see
        return (
            <div>
                <input type="text" placeholder="sky color" value={props.attributes.skyColor} onChange={(e) => {props.setAttributes({skyColor: e.target.value})}}></input>
                <input type="text" placeholder="grass color" value={props.attributes.grassColor} onChange={(e) => {props.setAttributes({grassColor: e.target.value})}}></input>
                <input></input>
            </div>
        )
    },
    //public will see in content
    //Difference than before is making dynamic content where block types will be updated immediately
    save: (props) => {
        return null;
    },
    //stores the past changes (around 3h 5mins in) so if html structures changes some errors may occur
    //not needed since we dynamically make the content
    // deprecated: [{
    //     attributes:{
    //         skyColor: {type: "string"},
    //         grassColor: {type: "string"}
    //     },
    //     save: (props) => {
    //         return <p>Today the sky is {props.attributes.skyColor} and the grass is {props.attributes.grassColor}.</p>
    //     },
    // }]
});
