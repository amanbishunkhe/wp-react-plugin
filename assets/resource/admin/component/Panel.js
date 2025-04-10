import { Flex,FlexItem,TextControl } from '@wordpress/components' ;
import { __ } from '@wordpress/i18n';
import { useState } from 'react';
  
function Panel(){

    const [ accountNumber , setAccountNumber]  = useState( '' );
    const handleChange = (newValue) => {
        setAccountNumber( newValue );
    }

    return(
        <Flex>  
            <FlexItem>
                <TextControl
                    label = { __( 'Acount Number' )}
                    value ={ accountNumber } 
                    onChange = { handleChange }
                    type  = {'text'}

                />
            </FlexItem>
           
        </Flex>    
    )
}

export default Panel;