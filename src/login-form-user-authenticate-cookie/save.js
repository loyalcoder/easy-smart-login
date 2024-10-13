/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Save function to render the block's frontend output.
 *
 * @param {Object} props The block properties.
 * @return {Element} The saved content of the block.
 */
export default function save( { attributes } ) {
    const { label, labelColor, labelFontSize, labelFontFamily, labelMarginBottom } = attributes;

    return (
        <div { ...useBlockProps.save() }>
            
            <input
                type="checkbox"
                className="form-check-input"
                id="userAuthenticateCookieInput"
            />
            <label
                htmlFor="userAuthenticateCookieInput"
                className="form-label"
                style={ {
                    color: labelColor,
                    fontSize: labelFontSize,
                    fontFamily: labelFontFamily,
                    marginBottom: labelMarginBottom,
                } }
            >
                { label || wp.i18n.__( 'Authenticate Cookie', 'easy-smart-login' ) }
            </label>
        </div>
    );
}