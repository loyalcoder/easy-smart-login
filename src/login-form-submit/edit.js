/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * InnerBlocks component to allow child blocks.
 */
import { InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';
/**
 * Edit function to define the block's editor interface.
 *
 * @return {Element} Element to render in the editor.
 */
export default function Edit() {
    return (
        <div { ...useBlockProps() }>
            <button type="submit" className="submit-button">
                { __( 'Submit', 'easy-smart-login' ) }
            </button>
        </div>
    );
}