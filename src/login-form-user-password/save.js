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
    const { placeholder, label, labelColor, labelFontSize, labelFontFamily, labelMarginBottom } = attributes;

    return (
        <div { ...useBlockProps.save() }>
            <label
                htmlFor="userPasswordInput"
                className="form-label"
                style={ {
                    color: labelColor,
                    fontSize: labelFontSize,
                    fontFamily: labelFontFamily,
                    marginBottom: labelMarginBottom,
                } }
            >
                { label || wp.i18n.__( 'Password', 'easy-smart-login' ) }
            </label>
            <input
                type="password"
                className="form-control"
                id="userPasswordInput"
                placeholder={ placeholder || wp.i18n.__( 'Enter your password', 'easy-smart-login' ) }
            />
        </div>
    );
}