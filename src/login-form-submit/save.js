/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * InnerBlocks component to render child blocks on the front end.
 */
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * Save function to render the block's frontend output.
 *
 * @param {Object} props The block properties.
 * @return {Element} The saved content of the block.
 */
export default function save( { attributes } ) {
    const { buttonText } = attributes;

    return (
        <div { ...useBlockProps.save() }>
            <button type="submit" className="submit-button">
                { buttonText || wp.i18n.__( 'Submit', 'easy-smart-login' ) }
            </button>
        </div>
    );
}